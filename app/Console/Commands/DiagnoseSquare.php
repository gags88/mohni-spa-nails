<?php

namespace App\Console\Commands;

use App\Services\Square\SquareClient;
use Illuminate\Console\Command;
use Throwable;

class DiagnoseSquare extends Command
{
    protected $signature = 'square:diagnose';

    protected $description = 'Run read-only checks against the configured Square environment';

    public function handle(SquareClient $square): int
    {
        $this->info('Square appointment integration diagnostics');
        $this->line('Environment: '.strtoupper($square->environment()));
        $this->line('Configured location: '.($square->locationId() ?: 'missing'));
        $this->newLine();

        if (!$square->configured()) {
            $this->error('Square credentials are incomplete. Nothing was sent to Square.');
            return self::FAILURE;
        }

        $failures = 0;

        $locations = $this->check('Locations API', function () use ($square) {
            return $square->locations();
        }, $failures);

        if (is_array($locations)) {
            $location = collect($locations)->firstWhere('id', $square->locationId());
            if ($location) {
                $this->line(sprintf(
                    '  Location: %s (%s, %s)',
                    $location['name'] ?? $square->locationId(),
                    $location['country'] ?? 'unknown country',
                    $location['currency'] ?? 'unknown currency'
                ));
            } else {
                $this->error('  Configured location ID was not returned by this Square account.');
                $failures++;
            }
        }

        $services = $this->check('Appointment service catalog', function () use ($square) {
            return $square->appointmentServices();
        }, $failures);
        if (is_array($services)) {
            $this->line('  Appointment items: '.count($services));
        }

        $profile = $this->check('Business booking profile', function () use ($square) {
            return $square->businessBookingProfile();
        }, $failures);
        if (is_array($profile)) {
            $this->line('  Seller-level writes: '.(!empty($profile['support_seller_level_writes']) ? 'supported' : 'not supported'));
        }

        $team = $this->check('Bookable team members', function () use ($square) {
            return $square->bookableTeamMembers();
        }, $failures);
        if (is_array($team)) {
            $this->line('  Bookable team members: '.count($team));
        }

        $this->newLine();
        if ($failures > 0) {
            $this->error("Diagnostics completed with {$failures} failed check(s). No data was changed.");
            return self::FAILURE;
        }

        $this->info('All Square foundation checks passed. No data was changed.');
        return self::SUCCESS;
    }

    protected function check(string $label, callable $callback, int &$failures)
    {
        try {
            $result = $callback();
            $this->info("✓ {$label}");
            return $result;
        } catch (Throwable $exception) {
            $this->error("✗ {$label}: {$exception->getMessage()}");
            $failures++;
            return null;
        }
    }
}
