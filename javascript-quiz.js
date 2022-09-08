let second_form = document.querySelectorAll('form')[1],//we get second form it counts from 0
    hello_word_span = document.getElementById("hello_world_span");

hello_word_span.addEventListener("click", function () {
    second_form.submit();
});
//all done