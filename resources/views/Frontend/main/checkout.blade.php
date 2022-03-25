@extends('Frontend.main.index')
@section('content')
<style>
.typewriter h4 {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .15em solid orange; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation:
    typing 3.5s steps(40, end),
    blink-caret .75s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: orange; }
}
</style>
<section class="sign-in-form section-padding">
    <div class="container">
        <div class="typewriter" style="text-align: center; font-weight: bold;">
            <h4>Cảm ơn quý khách đã ủng hộ của hàng của chúng tôi!!!</h4>
        </div>
    </div>
</section>
@endsection
