@if(session()->has('message'))
<div id="message-alert"
     class="alert-message">
        <p class="text-center text-white fw-bold ">
                {{session('message')}}
        </p>
      </div>
@endif

<script>
function hideMessage(){
    setTimeout(function(){
        $("#message-alert").css('opacity','0');
        
    },4000);
}

hideMessage();
clearTimeout();
</script>
