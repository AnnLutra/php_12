
document.querySelector('.clear').addEventListener('click',  () => {
    document.querySelector('.person').textContent = 'Пользователь:';
});

document.querySelectorAll('.input').forEach(function(input){
    input.addEventListener('click', function(){this.value = '';});
});