// SCRIPT MENU

function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        document.querySelector('.icon').src = "src/img/menu_white_36dp.svg";
    } else {
        menuMobile.classList.add('open');
        document.querySelector('.icon').src = "src/img/close_white_36dp.svg";
    }
}

// SCRIPT LOGIN E CADASTRO

const forms = document.querySelector(".forms"),
      pwShowHide = document.querySelectorAll(".eye-icon"),
      links = document.querySelectorAll(".link");

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

        pwFields.forEach(password => {
            if(password.type === "password"){
                password.type = "text";
                eyeIcon.classList.replace("bx-hide, bx-show");
                return;
            }
            password.type = "password";
                eyeIcon.classList.replace("bx-show, bx-hide");
        })
    })
})

links.forEach(link => {
    link.addEventListener("click", e => {
        e.preventDefault(); //impedindo o envio de formulários
        forms.classList.toggle("show-signup");
    })
})

// Calcula a altura do conteúdo e define a altura da section
function ajustarAlturaDaSection() {
    var section = document.getElementById('mySection');
    var form = document.querySelector('form');

    // Obtemos a altura do conteúdo absoluto (form)
    var alturaDoConteudo = form.offsetHeight;

    // Ajustamos a altura da section
    section.style.minHeight = alturaDoConteudo + 'px';
  }

  // Chama a função quando a página é carregada
  window.addEventListener('load', ajustarAlturaDaSection);

  // Chama a função sempre que o tamanho da janela é alterado (útil para layouts responsivos)
  window.addEventListener('resize', ajustarAlturaDaSection);