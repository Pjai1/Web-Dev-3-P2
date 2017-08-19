<div class="faq-content">
    <h1 class="title">Veelgestelde vragen</h1>
    @if($faqs->count())
        @foreach ($faqs as $faq)
            <div class="faq">
                <h3>{{ $faq->{LaravelLocalization::getCurrentLocale()."_question"} }}</h3>
                <p>{{ $faq->{LaravelLocalization::getCurrentLocale()."_answer"} }}</p>
            </div>
        @endforeach
    @endif
</div>