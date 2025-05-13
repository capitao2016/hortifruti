const menu = document.querySelector('.menu')
const menu_modal = document.querySelector('.menu_modal')
const f_menu_lateral = document.querySelector('.btn_fechar') 

menu.addEventListener('click', () =>{
    menu_modal.classList.toggle('open')
})
f_menu_lateral.addEventListener('click', () =>{
    menu_modal.classList.toggle('open')
})