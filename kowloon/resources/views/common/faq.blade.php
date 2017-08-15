<div class="faq-content">
    <h1 class="title">Veelgestelde vragen</h1>
    @if($faqs->count())
        @foreach ($faqs as $faq)
            <div class="faq">
                <h3>{{$faq->question}}</h3>
                <p>{{$faq->answer}}</p>
            </div>
        @endforeach
    @endif
</div>