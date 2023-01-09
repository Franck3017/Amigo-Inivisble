const $ = (selector) => document.querySelector(selector)
const $$ = (selector) => document.querySelectorAll(selector)

const form = $('#form')
const list = $('#list')
const mainform = $('.main-form')
let i = 0

mainform.addEventListener('click', e => {
  const targ = e.target
  if (targ.tagName === 'A' && targ.className.includes('añadir')) {
    addElement()
    showMessage('Se ha añadido correctamente', 'btn-info', 500, form)
  }
  if (targ.tagName === 'A' && targ.className.includes('eliminar')) {
    deleteElement()
    showMessage('Se ha eliminado correctamente', 'btn-danger', 1000, form)
  }

})

const sendForm = (e) => {
  e.preventDefault()
  
  const name = $('#name').value
  const email = $('#email').value
  const groups = $$('.groups')

  if (!name || !email) {
    showMessage('Debes rellenar los campos solicitados', 'btn-danger', 1500, form)
  } else if (groups.length > 1){
    showMessage('Se esta procesando los datos', 'btn-success', 1500, form)
    setTimeout(() => {
      form.submit()
      form.reset()
    }, 500)
  } else {
    showMessage('Debes añadir al menos 2 amigos', 'btn-info', 1500, form)
  }
}

form.addEventListener('submit', sendForm)

const addElement = () => {
  const div = document.createElement('div')
  div.className = 'groups'
  div.innerHTML = `
    <div class="list-group">
      <div class="list-group__name">
        <label for="name">Nom</label>
        <input type="text" name="name[]" id="name${i}" class="list__name">
      </div>
      <div class="list-group__email">
        <label for="email">Correu Electrònic</label>
        <input type="email" name="mail[]" id="email${i}" class="list__email">
      </div>
      <div class="list-group__trash">
        <a href="#" id="eliminar" class="btn btn-danger eliminar">
          <i class="fas fa-trash-alt"></i>
        </a>
      </div>
    </div>
  `
  i++
  list.append(div)
}

const deleteElement = () => {
  eliminar.parentElement.parentElement.parentElement.remove()
}

const showMessage = (message, classSCSS, interval, downElement) => {
  const div = document.createElement('div')
  div.className = 'show'
  div.innerHTML = `
    <div class="${classSCSS}">
      <p>${message}</p>
    </div>
  `
  downElement.append(div)

  setTimeout(() => {
    $('.show').remove()
  }, interval)
}