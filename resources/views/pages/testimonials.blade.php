@php
    $reviews = [
        [
            'name' => 'Navneet Garcha',
            'text' => 'In the beginning, I was looking for the best options in Winnipeg for my laser, I was so scared because I have very sensitive skin and I didn\'t know how this was going to work and how the machines would react to my skin…I went to this place and the atmosphere was amazing. It feels like you\'re going in there for some really good self-care place. She is a fabulous and loveable person. She did my face and underarms and I got 2 sittings yet and the results have been fantastic, also they just got new machines which are PAINLESS, all you will feel is air touching your skin. Thank you Mohni Spa & Nails. 😊',
        ],
        [
            'name' => 'Rochelle Trenchard',
            'text' => 'Wonderful place for any spa treatment. Mohni Spa and Nails has great prices, amazing results, and a very clean work environment. I\'ve only done two treatments of the Soprano Ice Platinum laser hair removal and the outcome has been incredible. I highly recommend Mohni if you are looking for quality at an affordable price.',
        ],
        [
            'name' => 'Barbara Parkin',
            'text' => 'The new technology Sopranoice. Platinum laser for hair removal was remarkable. My legs are so smooth and it really works! Mohni was professional and knowledgeable on all aspects of the service. No more shaving, yay 😀',
        ],
        [
            'name' => 'Brittney Ann',
            'text' => 'Best place in my life ❤❤❤❤ excellent !!!! I have had several pedicures both at spa & nail salons. Today might have been the best one hot stone massage on your legs & feet, and fabulous toes!',
        ],
        [
            'name' => 'Marilynne',
            'text' => 'Beautiful clean spa. Mohni is very skilled and knowledgeable. A professional spa. Offers a wide range of services. I enjoy the experience every time. I highly recommend Mohni Spa!!',
        ],
        [
            'name' => 'Kristina K',
            'text' => 'Mohni and her team are awesome! They are very friendly, professional and go out of their way to make your experience special. The atmosphere is relaxing and they offer a variety of services which use high quality products at affordable pricing. I\'ve had manicures, pedicures, facials & massages and have always had a great experience. I love this place and highly recommend it. Thanks Mohni!',
        ],
        [
            'name' => 'Marie Cecile Kotyk',
            'text' => 'I\'ve been going to Mohni for many years. She is the only one I trust with the following services: eyebrow threading and shaping, facial, massage, manicure, and pedicure. She ALWAYS does a great job and her customer service is impeccable. I highly recommend her!',
        ],
        [
            'name' => 'Lorraine Thistlethwaite',
            'text' => 'I go to Mohni\'s Spa and Nails to have great pedicure\'s and have my leg\'s waxed. The service is excellent. I highly recommend this spa to everyone!',
        ],
        [
            'name' => 'Jaspreet Sond',
            'text' => 'Amazing experience here with Mohni Spa & Nails. Really admire her skin experience and hygienic equipments. The way salon is all set up and her loyalty. Had amazing deal on facial and meni and pedicure. Instantly my skin was feeling refreshed and I was seeing results on my face which I never had seen in years!!',
        ],
        [
            'name' => 'Jhenifer Timpug',
            'text' => 'Great and Friendly service at Mohni\'s! Had a custom pedi done here and the service was amazing! The foot massage made it even better. My nails are still in perfect condition after 3 weeks!! Will be coming back here again! Thanks.',
        ],
        [
            'name' => 'Navjot Singh Bhatti',
            'text' => 'This is one of the best salons I\'ve been to! They actually open up new tools to use for pedicures, and sanitize all the tools that they\'ll reuse for manicures. The location is great as it\'s close to my home. The staff normally don\'t speak in their Oriental language which is great; they actually interact with customers instead.',
        ],
    ];
@endphp

<section id="mh-testimonial" class="mohni-testimonials mohni-section" aria-labelledby="testimonials-title">
    <div class="container">
        <div class="mohni-heading-row mohni-heading-row--testimonials">
            <div>
                <p class="mohni-eyebrow">Client stories</p>
                <h2 id="testimonials-title" class="mohni-display">Kind words,<br>beautifully shared.</h2>
            </div>
            <p>Real experiences from clients who trust Mohni for laser, skin, nail and restorative spa care.</p>
        </div>
        <div id="mh-testimonialslider" class="mohni-testimonial-grid owl-carousel owl-theme" aria-label="Client reviews">
            @foreach ($reviews as $review)
                <blockquote>
                    <span class="mohni-quote-mark" aria-hidden="true">&ldquo;</span>
                    <p>{{ $review['text'] }}</p>
                    <footer>
                        <strong>{{ $review['name'] }}</strong>
                        <span>Client review</span>
                    </footer>
                </blockquote>
            @endforeach
        </div>
    </div>
</section>
