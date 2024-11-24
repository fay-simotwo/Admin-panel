<?php
$pageTitle = "Support";
include('includes/header.php');
?>

<div class="container py-5">
    <!-- Support Header -->
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #ec0e3e;">How Can We Help You?</h2>
        <p class="text-muted">Browse our FAQs or contact us via WhatsApp for personalized assistance.</p>
    </div>

    <!-- FAQ Section -->
    <div class="accordion mb-5" id="faqAccordion">
        <h3 class="mb-4 fw-bold" style="color: #5c012b;">Frequently Asked Questions</h3>
        
        <!-- Question 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer1" aria-expanded="true" aria-controls="answer1">
                    How can I track the progress of my repair?
                </button>
            </h2>
            <div id="answer1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    You can track the status of your repair by entering your tracking ID on the <a href="track-repair.php" style="color: #ec0e3e; font-weight: bold;">Track Your Repair</a> page.
                </div>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2" aria-expanded="false" aria-controls="answer2">
                    What types of devices do you repair?
                </button>
            </h2>
            <div id="answer2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    We repair a wide range of devices, including smartphones, laptops, tablets, and more. Visit our <a href="services.php" style="color: #ec0e3e; font-weight: bold;">Services</a> page for more details.
                </div>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3" aria-expanded="false" aria-controls="answer3">
                    How long does the repair process take?
                </button>
            </h2>
            <div id="answer3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Repair times vary depending on the device and issue. Most repairs are completed within 3-5 business days.
                </div>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer4" aria-expanded="false" aria-controls="answer4">
                    How can I contact customer support?
                </button>
            </h2>
            <div id="answer4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    You can reach our support team via email at <a href="mailto:support@nelsrepairs.com" style="color: #ec0e3e; font-weight: bold;">support@nelsrepairs.com</a> or chat with us directly on WhatsApp using the button below.
                </div>
            </div>
        </div>
    </div>

    <!-- WhatsApp Support Section -->
    <div class="text-center mt-5">
        <h3 class="fw-bold" style="color: #5c012b;">Still Need Help?</h3>
        <p class="text-muted mb-4">Chat with us on WhatsApp for instant assistance.</p>
        <a href="https://wa.me/254768822652" target="_blank" class="btn btn-lg" style="background-color: #25d366; color: #fff; border-radius: 30px; padding: 10px 20px;">
            <i class="fab fa-whatsapp"></i> Chat on WhatsApp
        </a>
    </div>
</div>

<?php include('includes/footer.php'); ?>
