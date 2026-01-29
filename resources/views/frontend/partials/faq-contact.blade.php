<!-- FAQ & Contact Form Section -->
<!-- rts faq area start -->
<section class="rts-faq-area-start rts-section-gap" aria-label="Frequently Asked Questions and Contact VegaVision">
    <div class="container">
        <div class="row align-items-center">

            <!-- FAQ Left Column -->
            <div class="col-lg-5 pr--50 pr_lg--20 pr_md--10 pr_sm--10">
                <div class="faq-left-area-main">
                    <header class="title-left-wrapper">
                        <span class="pre">FAQ</span>
                        <h2 class="title rts-text-anime-style-1">
                            Everything You Need <br />
                            to Know About VegaVision
                        </h2>
                    </header>
                    <p class="disc">
                        Have questions about VegaVision platforms and services? This section addresses common topics around
                        implementation, integration, and ongoing support.
                    </p>

                    <!-- FAQ Accordion -->
                    <div class="accordion-faq-one" id="faqAccordion">
                        <div class="accordion" id="accordionExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        How long does a typical VegaVision implementation take?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Implementation timelines vary by project scope and integrations. Many organisations
                                        adopt a phased go-live over a few weeks to a few months, guided by our delivery team.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Can VegaVision integrate with our existing systems?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Yes. VegaVision platforms integrate with popular ERP, CRM, directory, and network systems
                                        using APIs, connectors, and custom integration services.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Do you offer managed or SaaS options?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        VegaVision can be deployed on-premises, in your cloud, or as a fully managed SaaS solution,
                                        providing flexibility for your operations and hosting model.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Right Column -->
            <div class="offset-lg-1 col-lg-6">
                <div class="contact-form-style-one mt--30">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="title mb-0">Let’s Talk</h3>
                        @if (!empty($site_settings['phone']))
                        <a href="javascript:void(0)">
                            {{ $site_settings['phone'] ?? '' }}
                            </a>
                        @endif
                    </div>
                    <form onsubmit="return handleSubmit();" id="contactForm" aria-label="Contact Form to discuss IT solutions">
                        @csrf
                        <div class="single-input-wrapper justify-content-between">
                            <div class="single-input">
                                <label for="name" class="visually-hidden">Full Name</label>
                                <input type="text" id="name" name="name" placeholder="Full Name" required />
                            </div>
                            <div class="single-input">
                                <label for="organization" class="visually-hidden">Organisation</label>
                                <input type="text" id="organization" name="organization" placeholder="Organisation" required />
                            </div>
                        </div>

                        <div class="single-input-wrapper justify-content-between">
                            <div class="single-input">
                                <label for="email" class="visually-hidden">Work Email</label>
                                <input type="email" id="email" name="email" placeholder="Work Email" required />
                            </div>
                            <div class="single-input">
                                <label for="phone" class="visually-hidden">Phone Number</label>
                                <div class="d-flex">
                                    <select id="country-code" name="country_code" class="form-select" aria-label="Country Code" required>
                                        @foreach($countryCodes as $country)
                                        <option value="{{ $country->phonecode ?? ''  }}">{{ $country->iso }} ({{ $country->phonecode ?? '' }})</option>
                                        @endforeach
                                    </select>
                                    <input type="tel" id="phone" name="phone" placeholder="Phone Number" class="flex-grow-1" required />
                                </div>

                            </div>
                        </div>

                        <div class="single-input">
                            <label for="message" class="visually-hidden">Message</label>
                            <textarea id="message" name="message"
                                placeholder="Tell us about your business requirements" required></textarea>
                        </div>

                        <button class="rts-btn btn-primary" id="contactSubmitBtn" type="submit">Send Message</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- rts faq area end -->

<!-- Include Google Places API -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>

<script>
    // Initialize Google Autocomplete for the Organisation input field
    function initializeAutocomplete() {
        const input = document.getElementById('organization');
        const autocomplete = new google.maps.places.Autocomplete(input);

        // Restrict the search to organizations/businesses only
        autocomplete.setFields(['name']);
    }

    // Load the autocomplete when the page is fully loaded
    document.addEventListener('DOMContentLoaded', initializeAutocomplete);

    function handleSubmit() {
        $.ajax({
            url: "{{ route('contact.submit') }}",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($('#contactForm')[0]),
            dataType: 'json',
            beforeSend: function() {
                $('#contactSubmitBtn').prop('disabled', true);
                $('#contactSubmitBtn').text('Process....');
                // Clear previous error messages
                $('.text-danger').remove();
            },
            success: function(res) {
                $('#contactSubmitBtn').prop('disabled', false);
                $('#contactSubmitBtn').text('Send Message');
                if (res.status == '2') {
                    showSweetAlert('success', 'Success', res.message, function() {
                        $('#contactForm')[0].reset();
                    });
                } else {
                    showSweetAlert('error', 'Error', res.message);
                }
            },
            error: function(error) {
                $('#contactSubmitBtn').prop('disabled', false);
                $('#contactSubmitBtn').text('Send Message');
                if (error.status === 422) {
                    const errors = error.responseJSON.errors;
                    for (const field in errors) {
                        const errorMessage = errors[field][0];
                        const inputField = $(`[name="${field}"]`);
                        inputField.after(`<div><span class="text-danger ms-2">${errorMessage}</span></div>`);
                    }
                } else {
                    showSweetAlert('error', 'Error', 'An unexpected error occurred. Please try again later.');
                }
            }
        });
        return false;
    }
</script>
