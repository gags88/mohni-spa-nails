<?php

return [
    'body-treatments' => [
        'overview_title' => 'Restore, soften and unwind',
        'overview' => ['Body rituals are selected to support smoother skin, deep relaxation and an unhurried sense of renewal. Your esthetician will help you choose the right treatment for how you want to feel.'],
        'highlights' => ['Skin-softening exfoliation', 'Comfort-led relaxation', 'Personalized treatment choice'],
        'pricing' => ['menuKey' => 'body-treatments'],
        'sections' => [
            ['title' => 'Body Glow', 'body' => ['A renewing exfoliation treatment that removes dull surface cells and leaves the skin feeling soft, smooth and luminous.']],
            ['title' => 'Body Wrap', 'body' => ['A cocooning treatment combining exfoliation, a targeted body mask and warmth to support hydration, relaxation and a refined skin texture.']],
        ],
    ],
    'dermaplaning' => [
        'overview_title' => 'A polished, luminous finish',
        'overview' => ['Dermaplaning uses a precise exfoliating blade to remove dull surface cells and fine facial hair, revealing skin that looks smoother, brighter and more even.'],
        'highlights' => ['No downtime', 'Smoother makeup application', 'Suitable for many skin types'],
        'pricing' => ['menuKey' => 'facials', 'menuIdSuffix' => 'dermaplaning', 'menuTitle' => 'Dermaplaning pricing', 'menuIntro' => 'Choose focused exfoliation or combine dermaplaning with a complete facial.', 'groupTitle' => 'Dermaplaning', 'only' => ['Dermaplaning', 'Dermaplaning Facial']],
        'sections' => [['title' => 'Ideal for', 'list' => ['Dull or dry-looking skin', 'Uneven texture', 'Fine facial hair', 'A smooth pre-event finish']]],
    ],
    'facials' => [
        'overview_title' => 'Skincare chosen around you',
        'overview' => ['You do not need to know which facial to book. We begin by looking at your skin, discussing your concerns and selecting the treatment best suited to your goals.'],
        'highlights' => ['Personal skin consultation', 'Targeted professional products', 'Options for hydration, clarity and renewal'],
        'pricing' => ['menuKey' => 'facials'],
        'sections' => [['title' => 'A thoughtful approach', 'body' => ['Treatments may include cleansing, exfoliation, extractions when appropriate, a targeted mask and finishing products. Advanced options such as HydraFacial, dermaplaning and microdermabrasion are available when your skin would benefit from more focused care.']]],
    ],
    'hydra-facial' => [
        'overview_title' => 'Cleanse, extract and hydrate',
        'overview' => ['HydraFacial is a multi-step treatment that deeply cleanses, exfoliates and replenishes the skin with tailored serums—all within a comfortable appointment.'],
        'highlights' => ['Deep pore cleansing', 'Gentle exfoliation', 'Immediate hydration'],
        'pricing' => ['menuKey' => 'facials', 'menuIdSuffix' => 'hydrafacial', 'menuTitle' => 'HydraFacial treatments', 'menuIntro' => 'Select the level of cleansing, exfoliation and hydration your skin needs.', 'groupTitle' => 'HydraFacial', 'only' => ['Signature HydraFacial', 'Deluxe HydraFacial', 'Platinum HydraFacial']],
        'sections' => [['title' => 'How it works', 'list' => ['Cleanse and resurface the skin', 'Lift debris from congested pores', 'Infuse hydrating antioxidants and serums']]],
    ],
    'makeup' => [
        'overview_title' => 'Polished and unmistakably you',
        'overview' => ['Professional makeup application tailored to your features, personal style and occasion—from soft, natural definition to a more elevated event finish.'],
        'highlights' => ['Personalized colour selection', 'Event-ready finish', 'Professional application'],
        'pricing' => ['menuKey' => 'body-treatments', 'menuIdSuffix' => 'makeup', 'menuTitle' => 'Makeup application', 'menuIntro' => 'Professional application tailored to your features, style and occasion.', 'groupTitle' => 'Makeup', 'only' => ['Makeup Application']],
    ],
    'nails' => [
        'overview_title' => 'Beautifully maintained hands and feet',
        'overview' => ['From natural nail care to gel enhancements, every service is shaped around comfort, meticulous preparation and a polished finish.'],
        'highlights' => ['Manicures and pedicures', 'Gel and Gel-X options', 'Restorative nail care'],
        'pricing' => ['menuKey' => 'nails'],
        'sections' => [['title' => 'Finishing touches', 'body' => ['French tips, nail art, cat-eye gel, paraffin treatments and massage add-ons make it easy to personalize your appointment. Children’s services and manicure-pedicure combinations are also available.']]],
    ],
    'massage' => [
        'overview_title' => 'Make room to reset',
        'overview' => ['Relaxation-focused massage helps ease everyday tension and creates quiet time to slow down. Choose your preferred treatment and appointment length.'],
        'highlights' => ['Relaxation massage', 'Hot stone options', 'Foot massage and ear candling'],
        'pricing' => ['menuKey' => 'body-treatments', 'menuIdSuffix' => 'massage', 'menuTitle' => 'Massage and restorative care', 'menuIntro' => 'Choose a treatment length that gives you space to unwind and reset.', 'groupTitle' => 'Massage', 'only' => ['Relaxation Massage by Esthetician', 'Hot Stone Massage', 'Ear Candling', 'Foot Massage']],
    ],
    'micro-needling' => [
        'overview_title' => 'Considered collagen-induction care',
        'overview' => ['Microneedling creates controlled micro-channels that encourage the skin’s natural renewal response. We use the eDermaStamp device and provide clear preparation and aftercare guidance.'],
        'highlights' => ['Refines visible texture', 'Supports firmer-looking skin', 'Helps soften the look of scars and pores'],
        'pricing' => ['menuKey' => 'facials', 'menuIdSuffix' => 'microneedling', 'menuTitle' => 'Microneedling pricing', 'menuIntro' => 'A focused treatment with time for preparation and aftercare guidance.', 'groupTitle' => 'Microneedling', 'only' => ['Microneedling']],
        'sections' => [['title' => 'After your treatment', 'body' => ['Temporary redness similar to a mild sunburn is normal for 48–72 hours. Treatments are generally spaced four to six weeks apart.'], 'list' => ['Avoid heavy exercise, saunas, steam rooms and swimming for 5–7 days', 'Avoid facial waxing and laser treatments while the skin recovers', 'Wait 24 hours before mineral makeup and follow your esthetician’s sunscreen guidance']]],
    ],
    'microdermabrasion' => [
        'overview_title' => 'Refine texture and restore radiance',
        'overview' => ['Diamond microdermabrasion gently resurfaces the skin to improve the appearance of dullness, uneven texture and congestion.'],
        'highlights' => ['Diamond-tip exfoliation', 'Brighter-looking complexion', 'No invasive procedure'],
        'pricing' => ['menuKey' => 'facials', 'menuIdSuffix' => 'microdermabrasion', 'menuTitle' => 'Microdermabrasion pricing', 'menuIntro' => 'A diamond-tip exfoliation facial designed to reveal a smoother surface.', 'groupTitle' => 'Microdermabrasion', 'only' => ['Diamond Microdermabrasion Facial']],
    ],
    'nail-recovery' => [
        'overview_title' => 'Support for a polished, healthy-looking finish',
        'overview' => ['Thoughtful removal, overlays, fills and maintenance help protect the natural nail while keeping your manicure refined and wearable.'],
        'highlights' => ['Careful product removal', 'Gel overlays and fills', 'Maintenance tailored to your nails'],
        'pricing' => ['menuKey' => 'nails', 'menuIdSuffix' => 'recovery', 'menuTitle' => 'Gel and nail recovery services', 'menuIntro' => 'Removal, overlays and maintenance for a polished finish.', 'groupTitle' => 'Nail recovery', 'only' => ['Liquid Gel Full Set', 'Liquid Gel Fill', 'Fresh Gel Overlay', 'Gel Overlay Fill', 'Gel Removal', 'Shellac Removal', 'Shellac Removal and Treatment', 'Acrylic Removal']],
    ],
    'sugaring' => [
        'overview_title' => 'A gentle approach to smooth skin',
        'overview' => ['Sugaring uses a simple sugar-based paste to remove hair from the root. It is water-soluble and can be a comfortable option for many sensitive skin types.'],
        'highlights' => ['Natural sugar-based paste', 'Gentle surface exfoliation', 'Results that can last for weeks'],
        'sections' => [
            ['title' => 'Before your appointment', 'list' => ['Arrive with clean, dry skin without creams or deodorant', 'Allow approximately ¼ inch of hair growth', 'Avoid treatment over sunburned or broken skin']],
            ['title' => 'Aftercare', 'list' => ['Avoid vigorous exercise and excess perspiration immediately afterward', 'Avoid tanning while the skin settles', 'Follow your esthetician’s home-care guidance']],
        ],
    ],
    'threading' => [
        'overview_title' => 'Clean lines, carefully shaped',
        'overview' => ['Threading uses twisted cotton thread to remove hair from the root with control and precision, making it ideal for brows and facial areas.'],
        'highlights' => ['Detailed brow shaping', 'No wax or heat', 'Suitable for many skin types'],
        'pricing' => ['menuKey' => 'threading'],
    ],
    'tinting' => [
        'overview_title' => 'Effortless definition for brows and lashes',
        'overview' => ['Tinting, lifting and lamination services add subtle colour, shape and definition while working with your natural brows and lashes.'],
        'highlights' => ['Brow and lash tinting', 'Lash lift options', 'Brow lamination and combinations'],
        'pricing' => ['menuKey' => 'tinting'],
    ],
    'waxing' => [
        'overview_title' => 'Comfortable, precise hair removal',
        'overview' => ['Professional waxing for facial and body areas with time allowed for careful preparation, efficient service and a polished result.'],
        'highlights' => ['Facial and body options', 'Women-only intimate services', 'Clear preparation guidance'],
        'pricing' => ['menuKey' => 'waxing'],
        'sections' => [['title' => 'Before your appointment', 'body' => ['Please allow at least ¼ inch of hair growth. Clients using Accutane should avoid waxing, and those using retinoids should ask their skincare professional when it is safe to book.']]],
    ],
];
