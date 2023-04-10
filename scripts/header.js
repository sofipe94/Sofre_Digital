// const header = document.querySelector("header");
// let boton = document.querySelector("#newsletter");

// document.addEventListener("click", function(){
//         const line = document.createElement('div');
//         line.innerHTML = `
//         <div class="newsletter">
//       <div class="d-flex align-items-end justify-content-end">
//         <button type="button" class="btn-close" aria-label="Close"></button>
//       </div>
//       <div class="d-flex flex-column">
//         <img src="./images/header/newsletter/icon-newsletter.png" class="d-flex align-items-start justify-content-start newsletter_icon" alt="Newsletter">
//         <h4 class="d-flex align-items-start justify-content-start newsletter_title">Suscribete a nuestra Newsletter y recibe oportunidades laborales, metodologías y tips.</h4>
//       </div>
//       <div class="newsletter_formulario">
//         <form>
//           <div class="d-flex flex-inline">
//             <div class="mb-3">
//               <label for="Nombre" class="form-label"></label>
//               <input type="email" class="form-control" id="Nombre" placeholder="Nombre *">
//             </div>
//             <div class="mb-3">
//               <label for="Apellido" class="form-label"></label>
//               <input type="email" class="form-control" id="Apellido" placeholder="Apellido *">
//             </div>
//           </div>
//           <div class="d-flex flex-inline">
//             <div class="mb-3 d-flex flex-column">
//               <label for="Email" class="form-label">Email *</label>
//               <input type="email" class="form-control" id="Email">
//             </div>
//             <div class="mb-3 d-flex flex-column">
//               <label for="Servicio" class="form-label">Servicio de Interés *</label>
//               <input type="email" class="form-control" id="Email">
//             </div>
//           </div>
//           <button type="submit" class="btn btn-primary">Enviar</button>
//         </form>
//       </div>
//     </div>`;
//         header.appendChild(line);
//     })


const header = document.querySelector(".navegador");
const headerPages = document.querySelector(".headerPages")

window.addEventListener("scroll", function(){
  header.classList.toggle('scrolling', window.scrollY>200)  
})


