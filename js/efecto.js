const $ = (selector) => document.querySelector(selector)
const form = $('#form')

const regularExpression = {
  name: /^[a-zA-Z0-9\_\-]{4,16}$/,
  email: /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/
}

window.addEventListener('load', () => {
  form.reset()
})

const validateField = (expression, input, name) => {
  if (expression.test(input.value)) {
    showMessage('El campo es correcto', 'btn-success', $(`.form-group__${name}`))
  } else {
    showMessage('El campo es incorrecto', 'btn-danger', $(`.form-group__${name}`))
  }
}

const validateForm = (e) => {
  if (e.target.name === 'username') {
    return validateField(regularExpression.name, e.target, 'name')
  } else {
    return validateField(regularExpression.email, e.target, 'email')
  }
}

const sendForm = (e) => {
  e.preventDefault()

  const name = $('#name').value
  const email = $('#email').value

  // Enviar el formulario, si los campos son validos y no vacios
  if (!name || !email) {
    showMessage('Debes rellenar los campos solicitados', 'btn-danger', form)
  } else {
    showMessage('Se esta procesando los datos', 'btn-success', form)
    setTimeout(() => {
      form.submit()
      form.reset()
    }, 500)
  }
}

const div = document.createElement('div')

const showMessage = (message, classSCSS, downElement) => {
  div.style.color = classSCSS === 'btn-success' ? 'green' : 'red'
  const messageDiv = `
    <p class="show__message">${message}</p>  
  `

  div.innerHTML = messageDiv
  downElement.append(div)
}

// Se valida los diferentes campos en tiempo real
form.addEventListener('keyup', validateForm)
// Solo se enviará el formulario si los campos son validos y no vacios
form.addEventListener('submit', sendForm)
