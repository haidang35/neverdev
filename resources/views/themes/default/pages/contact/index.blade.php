@extends('themes.default.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <article class="single-post post-card  no-image">
                <header class="post-header">
                    <h1 class="heading-large page-title text-center">
                        Contact
                    </h1>
                </header>
                <div class="post-content" id="contact-box">
                    <p>Hello! Do you have any questions or suggestions about this site, or just want to say Hi? Send me
                        a message using below form. I will get back to you as soon as possible.</p>
                    <!--kg-card-begin: html-->
                    <form action="#" method="POST" name="contact_form">
                        <input type="text" name="full_name" id="full_name" placeholder="Full name" required>
                        <input type="email" name="_replyto" id="email_contact" placeholder="Email" required>
                        <input type="text" name="subject" id="subject_contact" placeholder="Subject" required>
                        <textarea name="message" id="message_contact" placeholder="Message" rows="6" required></textarea>
                        <button class="btn btn-primary" type="submit" id="send-message-btn">Send Message</button>
                    </form>
                    <!--kg-card-end: html-->
                </div>
            </article>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('form[name=contact_form]').submit(function(e) {
            e.preventDefault();
            const fullName = $('#full_name').val();
            const email = $('#email_contact').val();
            const subject = $('#subject_contact').val();
            const message = $('#message_contact').val();
            $.ajax({
                type: "POST",
                url: "{{ route('contact') }}",
                data: { full_name: fullName, email, subject, message },
                beforeSend: function() {
                    $('#send-message-btn').html('<i class="fa fa-cog fa-spin loading-icon"></i>');
                },
                success: function (response) {
                    $('#contact-box').html(`
                    <div style="text-align:center;">
                        Thank you for contacting us. We will contact you as soon as we receive your information. Have a good day.
                    </div>
                    `
                    );
                    window.scrollTo(0, 0);
                }
            });
        })
    });
</script>
@endpush