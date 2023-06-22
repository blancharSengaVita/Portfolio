
// Close The Menu When Link Is Clicked

const CloseTheMenuWhenLinkIsClicked = {
    navLinks: [] as HTMLLinkElement[],
    menuCheckBox: HTMLInputElement,

    initConst(): void {
        this.navLinks = document.querySelectorAll('.nav__link');
        this.menuCheckBox = document.getElementById('menu');
    },

    closeMenuOnclick(): void {
        this.navLinks.forEach((link: HTMLLinkElement) => {
            link.addEventListener('click', () => {
                this.menuCheckBox.checked = false;
            });
        });
    },

    init(): void {
        this.initConst();
        this.closeMenuOnclick();
    }
};

CloseTheMenuWhenLinkIsClicked.init();


//display The Menu On Desktop

const displayTheMenuOnDesktop = {
    navDesktop: HTMLElement,
    navMobile: HTMLElement,

    initConst():void{
        this.navDesktop = document.querySelector('.menu--desktop');
        this.navMobile = document.querySelector('.menu--mobile');
    },

    selectGoodMenu(){
        if (window.innerWidth > 1024) {
            this.navDesktop.classList.remove('display-none');
            this.navMobile.classList.add('display-none');
        } else {
            this.navDesktop.classList.add('display-none');
            this.navMobile.classList.remove('display-none');
        }
    },

    selectGoodMenuOnLoad(){
        window.addEventListener('load', ()=>{
            this.selectGoodMenu();
        });
    },

    selectGoodMenuOnResize():void {
        window.addEventListener('resize', () => {
            this.selectGoodMenu();
        });
    },

    init(): void {
        this.initConst();
        this.selectGoodMenuOnLoad();
        this.selectGoodMenuOnResize();
    }
}

displayTheMenuOnDesktop.init();