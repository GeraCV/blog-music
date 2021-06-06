
const introduceMenu = (toogle, menu) => {
  const containerToogle = document.getElementById(toogle)
  const containerMenu = document.getElementById(menu)


  if (containerMenu && containerToogle) {
    containerToogle.addEventListener('click', () => {
      containerMenu.classList.toggle("show")
    })
  }
}

introduceMenu('toogle', 'menu')
