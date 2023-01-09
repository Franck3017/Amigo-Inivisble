const $ = (selector) => document.querySelector(selector)

const form = $('#form')
const list = $('#list')
const mainform = $('.main-form')

const regularExpression = {
  name: /^[a-zA-ZÀ-ÿ\s]{5,40}$/,
  email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
}

const sendForm = (e) => {
  e.preventDefault()
  const name = $('#name').value
  const email = $('#email').value

  if (name && email) {
    showMessage('Se ha enviado correctamente', 'btn-success', 1500, $('.list-group__name'))
  } else {
    showMessage('Debes rellenar los campos solicitados', 'btn-danger', 1500, $('.list-group__email'))
  }
  form.reset()
}

const validateForm = (e) => {
  if(e.target.name === 'name'){
    return validateField(regularExpression.name, e.target, 'name')
  }else {
    return validateField(regularExpression.email, e.target, 'email')
  }
}

const validateField = (expression, input, name) => {
  if(expression.test(input.value)){
    showMessage('Los parametros son correctos', 'btn-success', 500, $(`.list-group__${name}`))
  }else {
    showMessage('Los parametros son incorrectos', 'btn-danger', 500, $(`.list-group__${name}`))
  }
}

form.addEventListener('keyup', validateForm)
form.addEventListener('submit', sendForm)

mainform.addEventListener('click', e => {
  const targ = e.target
  if (targ.tagName === 'A' && targ.textContent === 'Añadir') {
    addElement()
    showMessage('Se ha añadido correctamente', 'btn-info', 1500, form)
  }
  if (targ.tagName === 'A' && targ.textContent === 'Eliminar') {
    deleteElement()
    showMessage('Se ha eliminado correctamente', 'btn-danger', 1500, form)
  }
})

const addElement = () => {
  const div = document.createElement('div')
  div.className = 'groups'
  div.innerHTML = `
    <div class="list-group">
      <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" class="list-group__name">
      </div>
      <div>
        <label for="email">Correu Electrònic</label>
        <input type="email" name="mail" id="email" class="list-group__email">
      </div>
      <div>
        <a href="#" id="eliminar" class="btn btn-danger eliminar">Eliminar</a>
      </div>
    </div>
  `
  list.append(div)
}

const deleteElement = () => {
  eliminar.parentElement.parentElement.remove()
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