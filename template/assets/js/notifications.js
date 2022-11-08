//------------------------------------------
//   General Notifications
//--------------------------------------------
function success(x, toastValue = false) {
  if(x){
    Swal.fire({
      position: toastValue ? 'top-end' : 'center',
      icon: 'success',
      title: x,
      showConfirmButton: false,
      toast: toastValue,
      timer: 2500
    })
  }else{
    Swal.fire({
      position: toastValue ? 'top-end' : 'center',
      icon: 'success',
      title: ':)',
      showConfirmButton: false,
      toast: toastValue,
      timer: 2500
    })
  }
}

function error(errortype) {
  Swal.fire({
    icon: "error",
    title: ":/",
    text: errortype,
  });
}

function warning(warningMessage) {
  Swal.fire({
    icon: "warning",
    title: "",
    text: warningMessage,
  });
}

// Modules enabled
function enableclients() {
  Swal.mixin({
    confirmButtonText: 'Siguiente →',
    cancelButtonText: 'omitir',
    showCancelButton: true,
    progressSteps: ['1', '2', '3']
  }).queue([
    {
      title: 'Modulo de gestión de clientes',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Hola!😁 <br> Te quiero dar una breve explicación sobre este modulo que has instalado para tu negocio.</p>`
    },
    {
      title:'🤔 Sobre su uso',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Este modulo fue pensado para poder tener los datos de nuestros clientes a mano, poder enviarles de manera rapida un mensaje por whatsapp, saber su correo, instagram, hasta incluso poder dejar una anotación por casos como "Este cliente es moroso" ó "Tiene un saldo a favor" (pequeñas notas que nos ayudan a recordar).</p>`
    },
    {
      title:'😬 Sacale provecho',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">
          Ahora verás que el modulo te aparece en el panel izquierdo. <br>Te invito a sacarle el máximo provecho y en caso de necesitar ayuda, te recuerdo que podes enviarnos un whatsapp con todas tus dudas 😀.</p>`
    }
  ])
}

function enableproducts() {
  Swal.mixin({
    confirmButtonText: 'Siguiente →',
    cancelButtonText: 'omitir',
    showCancelButton: true,
    progressSteps: ['1', '2', '3']
  }).queue([
    {
      title: 'Modulo de gestión de productos 🛒',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Hola!😁 <br> Te quiero dar una breve explicación sobre este modulo que has instalado para tu negocio.</p>`
    },
    {
      title:'🤔 Sobre su uso',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">El modulo de gestión de productos es una navaja suiza, por todas las utilidades que éste trae. <br> Con él podrás gestionar tus productos de manera centralizada, tener a mano el precio de costo, precio de venta y su ganancia. También si combinas este módulo con el módulo de <b>Enlaces</b>, vas a tener una lista de precios para compartir, un catálogo de tus productos, QR de ambos y exportar una lista en PDF por si queres imprimirlos, entre otras cosas 👀...</p>`
    },
    {
      title:'😬 Sacale provecho',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">
          Ahora verás que el modulo te aparece en el panel izquierdo. <br>Te invito a sacarle el máximo provecho y en caso de necesitar ayuda, te recuerdo que podes enviarnos un whatsapp con todas tus dudas 😀.</p>`
    }
  ])
}

function enablelinks() {
  Swal.mixin({
    confirmButtonText: 'Siguiente →',
    cancelButtonText: 'omitir',
    showCancelButton: true,
    progressSteps: ['1', '2', '3']
  }).queue([
    {
      title: 'Enlaces de tu negocio 📢',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Hola!😁 <br> Te quiero dar una breve explicación sobre este modulo que has instalado para tu negocio.</p>`
    },
    {
      title:'🤔 Sobre su uso',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Éste modulo contiene un apartado con todos los enlaces publicos que tiene tu negocio. Por ejemplo: lista de precios, catálogo y otros dependiendo si lo combinas con otros módulos.</p>`
    },
    {
      title:'😬 Sacale provecho',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">
          Ahora verás que el modulo te aparece en el panel izquierdo. <br>Te invito a sacarle el máximo provecho y en caso de necesitar ayuda, te recuerdo que podes enviarnos un whatsapp con todas tus dudas 😀.</p>`
    }
  ])
}

function enablecategories() {
  Swal.mixin({
    confirmButtonText: 'Siguiente →',
    cancelButtonText: 'omitir',
    showCancelButton: true,
    progressSteps: ['1', '2', '3']
  }).queue([
    {
      title: 'Categorías para tus productos 🏷 ',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Hola!😁 <br> Te quiero dar una breve explicación sobre este modulo que has instalado para tu negocio.</p>`
    },
    {
      title:'🤔 Sobre su uso',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Esta mejora para tus productos te permitirá agruparlos por categoría 🛒🛒. </p>`
    },
    {
      title:'😬 Sacale provecho',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">
          Podrás ver las categorías en el apartado de Productos. <br>Te invito a sacarle el máximo provecho y en caso de necesitar ayuda, te recuerdo que podes enviarnos un whatsapp con todas tus dudas 😀.</p>`
    }
  ])
}

function enableexpenses() {
  Swal.mixin({
    confirmButtonText: 'Siguiente →',
    cancelButtonText: 'omitir',
    showCancelButton: true,
    progressSteps: ['1', '2', '3']
  }).queue([
    {
      title: 'Control de gastos 💸 ',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Hola!😁 <br> Te quiero dar una breve explicación sobre este modulo que has instalado para tu negocio.</p>`
    },
    {
      title:'🤔 Sobre su uso',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">El éxito de un negocio depende fuertemente de que tan bien maneje sus gastos y es por eso que con éste modulo queremos facilitarte un poco las cosas. </p>`
    },
    {
      title:'😬 Sacale provecho',
      html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">
      Ahora verás que el modulo te aparece en el panel izquierdo. <br>Te invito a sacarle el máximo provecho y en caso de necesitar ayuda, te recuerdo que podes enviarnos un whatsapp con todas tus dudas 😀.</p>`
    }
  ])
}
