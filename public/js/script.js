
window.onload = function(){

   document.querySelector('.dataTables_filter  label> input').placeholder='Search in Table';
//    newlabelcontent= document.querySelector('.dataTables_filter  label').innerHTML.replace('Search:','');
//    document.querySelector('.dataTables_filter  label').innerHTML =newlabelcontent;
   document.querySelector('#table_id_wrapper').classList.toggle('table-responsive');

   document.querySelectorAll('#table_id tr').forEach((ele) => {
     ele.classList.remove('odd');
     ele.classList.remove('even');
     ele.querySelectorAll('td').forEach((elem) => {
        elem.classList.remove('sorting_1');
     })


   })


}

// SHOW MENU
const showMenu = (toggleId, navbarId,bodyId) =>{
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId),
    bodypadding = document.getElementById(bodyId)

    if(toggle && navbar){
        toggle.addEventListener('click', ()=>{
            // APARECER MENU
            navbar.classList.toggle('show')
            // ROTATE TOGGLE
            toggle.classList.toggle('rotate')
            // PADDING BODY
            bodypadding.classList.toggle('expander')
        })
    }
}
showMenu('nav-toggle','navbar','body')

// LINK ACTIVE COLOR
const linkColor = document.querySelectorAll('.nav__link');
function colorLink(){
    linkColor.forEach(l => l.classList.remove('active'));
    this.classList.add('active');
}

linkColor.forEach(l => l.addEventListener('click', colorLink));


