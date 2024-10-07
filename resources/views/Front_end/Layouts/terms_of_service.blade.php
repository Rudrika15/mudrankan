@extends("Front_end.Layouts.userside")

@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="text-center">Terms of Service</h2>

        <p class="text-center mb-4">Welcome to Mudrankan. These terms and conditions outline the rules and regulations for the use of our website. By accessing this website, we assume you accept these terms and conditions in full.</p>

        <h4>General Terms</h4>
        <p>By accessing and placing an order with [Your Store Name], you confirm that you are in agreement with and bound by the terms of service outlined below. These terms apply to the entire website and any email or other type of communication between you and [Your Store Name].</p>

        <h4>Products and Services</h4>
        <p>We reserve the right to limit the sales of our products or services to any person, geographic region, or jurisdiction. We may exercise this right on a case-by-case basis. All descriptions of products or product pricing are subject to change at any time without notice, at the sole discretion of us.</p>

        <h4>Modifications</h4>
        <p>We reserve the right to modify or terminate the service for any reason, without notice, at any time. We reserve the right to change these terms at any time. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p>

        <h4>Pricing and Payment</h4>
        <p>Prices for our products are subject to change without notice. We reserve the right to modify or discontinue a product at any time. We accept payments through [Payment Methods]. All payment information is handled securely, and your credit card or payment details will never be shared with any third parties.</p>

        <h4>Returns and Refunds</h4>
        <p>Please refer to our <a style="text-decoration:underline" href="{{ route('refund.policy') }}">Refund Policy</a> for information regarding returns and refunds.</p>
    
        <h4>Limitation of Liability</h4>
        <p>In no event shall [Your Store Name], nor its owners, directors, employees, partners, or suppliers, be liable for any indirect, incidental, special, consequential, or punitive damages, including but not limited to loss of data, use, or profits arising out of your use of or access to the service.</p>

        <h4>Governing Law</h4>
        <p>These terms and conditions are governed by and construed in accordance with the laws of [Your Country/State] and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>

        <h4>Contact Information</h4>
        <p>If you have any questions or concerns about this Privacy Policy, please contact us at:</p>

        <p>
            [Mudrankan] <br>
            [Surendranagar] <br>
            [www.mudrankan.com] <br>
            [+91 9999999999]
        </p>
    </div>


@endsection