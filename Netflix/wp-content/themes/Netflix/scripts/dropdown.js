
class FaqDropdown {
    
    constructor () {
        this.items = document.getElementsByClassName("faq-item");
        console.log(this.items);
        this.listen();
    }

    logItems() {
        console.log(this.items)
    }

    async listen() {
        for(let item of this.items) {
            item.addEventListener("click" , (event) => {

                if(!item.children[1].style.display || item.children[1].style.display == "none") {

                    for(let cItem of this.items) {
                        cItem.children[0].children[1].textContent = '+';
                        cItem.children[1].style.display = "none";
                    }

                    item.children[0].children[1].textContent = 'X';
                    item.children[1].style.display = "block";
                }
                else {
                    
                    item.children[1].style.display = "none";
                    item.children[0].children[1].textContent = '+';
                }

            });
        }

    }

}

export default FaqDropdown;