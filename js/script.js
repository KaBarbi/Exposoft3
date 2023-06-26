// função para o menu destop ficar 3 bars (hamburguer) no mobile

// Obtém a referência para o elemento com o id 'btn-mobile'
const btnMobile = document.getElementById("btn-mobile");

// Função responsável por alternar o menu
function toggleMenu(event) {
    // Verifica se o evento é do tipo 'touchstart' (toque na tela)
    if (event.type === "touchstart") event.preventDefault(); // Impede o comportamento padrão do evento de toque
    // Obtém a referência para o elemento com o id 'nav' (navegação)
    const nav = document.getElementById("nav");
    // Alterna a classe 'active' no elemento nav, adicionando se não existir ou removendo se já existir
    nav.classList.toggle("active");
    // Verifica se a classe 'active' está presente no elemento nav
    const active = nav.classList.contains("active");
    // Define o atributo 'aria-expanded' do elemento atual do evento como o valor da variável active
    event.currentTarget.setAttribute("aria-expanded", active);
    // Verifica se a variável active é verdadeira
    if (active) {
        // Define o atributo 'aria-label' do elemento atual do evento como 'Fechar Menu'
        event.currentTarget.setAttribute("aria-label", "Fechar Menu");
    } else {
        // Define o atributo 'aria-label' do elemento atual do evento como 'Abrir Menu'
        event.currentTarget.setAttribute("aria-label", "Abrir Menu");
    }
}

// Adiciona um ouvinte de evento de clique ao elemento btnMobile que chamará a função toggleMenu
btnMobile.addEventListener("click", toggleMenu);
// Adiciona um ouvinte de evento de toque ao elemento btnMobile que chamará a função toggleMenu
btnMobile.addEventListener("touchstart", toggleMenu);
