<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
     <!-- este es el encabezado -->
     <div class="contenedor-header">
        <header>
            <div class="logo">
                <a href="#inicio">
                    <img src="img/logohorizontal.png" alt="Logo">
                </a>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="#inicio" onclick="seleccionar()"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="#mision-vision"onclick="seleccionar()"><i class="fas fa-bullseye"></i> Misión y Visión</a></li>
                    <li><a href="#danzas" onclick="seleccionar()"><i class="fas fa-drum"></i> Danzas</a></li>
                    <li><a href="#servicios" onclick="seleccionar()"><i class="fas fa-concierge-bell"></i> Servicios</a></li>
                    <li><a href="#fotos" onclick="seleccionar()" ><i class="fas fa-images"></i> Fotos</a></li>
                    <li class="login"><a href="login.php"><i class="fas fa-user" ></i> Login</a></li>
                </ul>
            </nav>
            <div class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fas fa-bars"></i>
            </div>
        </header>
    </div>
   








<!-- este es el inicio principal botcito -->
    <section id="inicio" class="inicio">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 posicion_texto">
                    <img src="img/nomSV.png" alt="" class="nombre_horizontal">
                    <p>Sumaq Varas es un espacio dedicado a la preservación y promoción del patrimonio
                         cultural y folclórico de la región Cusco. Desde nuestros inicios, nos hemos 
                         comprometido a difundir nuestras tradiciones a través de presentaciones 
                         artísticas, programas de formación y actividades comunitarias.</p>
                    <div class="btn-group">
                        <a href="#footer" class="btn btn-primary"><i class="fas fa-user-plus"></i> Inscribirme</a>
                        <a href="https://wa.link/kyqb9t" class="btn btn-secondary" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                    </div>
                        
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
        </div>
    </section>

    









    
   <!-- Sección Misión y Visión -->
   <section id="mision-vision" class="m/v">
    <div class="row">
        <h1 class="text-center mb-3">Misión y Visión</h1>
        <div class="col-md-6 text-center mb-4 contenedorMV">
            <div class="p-4 border marco">
                <div class="icon">
                    <i class="fas fa-bullseye"></i>
                    <h4>Misión</h4>
                </div>
                
                    <p>Preservar, promover y difundir el patrimonio cultural y folclórico de nuestra 
                        región cusco. A través de programas de formación, presentaciones artísticas
                     y actividades comunitarias, buscamos fortalecer la identidad cultural, 
                     fomentar el respeto por nuestras tradiciones y contribuir al desarrollo 
                     cultural integral de nuestra sociedad. Nos comprometemos a educar y preparar 
                      a las nuevas generaciones  en las diversas manifestaciones de danza, 
                      Musica y  cultura
                       asegurando la continuacion y valorización de nuestras raíces culturales 
                       en marangani y mundo entero. somos sumaq varas somos originales.
                    </p>
                <a href="https://drive.google.com/" class="btn btn-info" target="_blank">Descargar</a>
            </div>
        </div>
        <div class="col-md-6 text-center mb-4 contenedorMV">
            <div class="p-4 border marco">
                <div class="icon">
                    <i class="fas fa-eye"></i>
                    <h4>Visión</h4>
                </div>
                <p>Ser una institución líder y referente en la preservación y difusión folklorica y 
                    la cultura, reconocida tanto a nivel nacional como internacional por
                     la excelencia de sus programas de formación y la calidad de sus presentaciones 
                     artísticas. Aspiramos a crear un espacio inclusivo y participativo donde las
                      personas de todas las edadespuedan conectarse con sus raíces culturales , 
                      donde la riqueza de nuestras tradiciones sea apreciada y celebrada por futuras
                       generaciones. Trabajamos para que nuestra comunidad reconozca y valore su
                        patrimonio cultural como un pilar fundamental de su identidad y desarrollo.</p>
                <a href="https://drive.google.com/" class="btn btn-info" target="_blank">Descargar</a>
            </div>
        </div>
    </div>
</section>












   <!-- estilos para toda la seccion de danzas-->
   <section id="danzas" class="danzas">
    <div class="contenedor">
        <h1 class="text-center mb-4">Nuestras Danzas</h1>
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-4 text-center danza-item">
                <img src="img/qanchiM.png" alt="Danza 1" class="img-fluid">
                <h4>QANCHI DE MAMUERA</h4>
                <p>es una danza agricola y guerrera de la comunidad de mamuera</p>
                <div class="btn-group">
                    <a href="https://www.youtube.com/" class="btn btn-primary" target="_blank" ><i class="fab fa-youtube"></i> Ver Video</a>
                    <a href="https://wa.link/qc1lum" class="btn btn-secondary" target="_blank" ><i class="fab fa-whatsapp"></i> Contactar</a>
                </div>
                
            </div>
            <div class="col-md-4 col-sm-6 mb-4 text-center danza-item">
                <img src="img/qashwa_chumbi.png" alt="Danza 2" class="img-fluid">
                <h4>QASWA DE CHUMBIVILCAS</h4>
                <p>Es una danza que con Sus cantos amorosos y 
                    existenciales a trascendido en todo el folklore
                     de nuestra historia</p>
                     <div class="btn-group">
                        <a href="https://www.youtube.com/" class="btn btn-primary" target="_blank" ><i class="fab fa-youtube"></i> Ver Video</a>
                        <a href="https://wa.link/qc1lum" class="btn btn-secondary"target="_blank" ><i class="fab fa-whatsapp"></i> Contactar</a>
                    </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 text-center danza-item">
                <img src="img/cogalla.png" alt="Danza 3" class="img-fluid">
                <h4>CARNAVAL DE CONGALLA</h4>
                <p>Es una danza que con Sus cantos amorosos y 
                    existenciales a trascendido en todo el folklore
                     de nuestra historia</p>
                     <div class="btn-group">
                        <a href="https://www.youtube.com/" class="btn btn-primary"target="_blank "><i class="fab fa-youtube"></i> Ver Video</a>
                        <a href="https://wa.link/qc1lum" class="btn btn-secondary"target="_blank "><i class="fab fa-whatsapp"></i> Contactar</a>
                    </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 text-center danza-item">
                <img src="img/wayra.png" alt="Danza 4" class="img-fluid">
                <h4>SOQA WAYRA</h4>
                <p>Es una danza que con Sus cantos amorosos y 
                    existenciales a trascendido en todo el folklore
                     de nuestra historia</p>
                     <div class="btn-group">
                        <a href="https://www.youtube.com/" class="btn btn-primary"target="_blank" ><i class="fab fa-youtube"></i> Ver Video</a>
                        <a href="https://wa.link/qc1lum" class="btn btn-secondary"target="_blank" ><i class="fab fa-whatsapp"></i> Contactar</a>
                    </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 text-center danza-item">
                <img src="img/quinua.png" alt="Danza 5" class="img-fluid">
                <h4>QUINUA SARUY</h4>
                <p>Es una danza que con Sus cantos amorosos y 
                    existenciales a trascendido en todo el folklore
                     de nuestra historia</p>
                     <div class="btn-group">
                        <a href="https://www.youtube.com/" class="btn btn-primary"target="_blank" ><i class="fab fa-youtube"></i> Ver Video</a>
                        <a href="https://wa.link/qc1lum" class="btn btn-secondary"target="_blank" ><i class="fab fa-whatsapp"></i> Contactar</a>
                    </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 text-center danza-item">
                <img src="img/ñaupa.png" alt="Danza 6" class="img-fluid">
                <h4>ÑAUPA QASWAY</h4>
                <p>Es una danza que con Sus cantos amorosos y 
                    existenciales a trascendido en todo el folklore
                     de nuestra historia</p>
                     <div class="btn-group">
                        <a href="https://www.youtube.com/" class="btn btn-primary" target="_blank"><i class="fab fa-youtube"></i> Ver Video</a>
                        <a href="https://wa.link/qc1lum" class="btn btn-secondary"target="_blank" ><i class="fab fa-whatsapp"></i> Contactar</a>
                    </div>
            </div>
        </div>
    </div>
</section>

    















    <section id="servicios" class="servicios">
        <div class="contenedor_servicios">
            <h1 class="text-center mb-4">Nuestros Servicios</h1>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-4 text-center servicio-item">
                    <div class="icono"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h4>Profesor de danza</h4>
                    <p>Clases de danza folclórica presencial, promoviendo la cultura tradicional peruana.</p>
                </div>
                <div class="col-md-4 col-sm-6 mb-4 text-center servicio-item">
                    <div class="icono"><i class="fas fa-female"></i></div>
                    <h4>Presentaciones con contrato:</h4>
                    <p>Espectáculos culturales y folclóricos personalizados bajo contrato,
                         ofreciendo una experiencia única y profesional.</p>
                </div>
                <div class="col-md-4 col-sm-6 mb-4 text-center servicio-item">
                    <div class="icono"><i class="fas fa-music"></i></div>
                    <h4>Música andina </h4>
                    <p>Interpretación de música andina tradicional con instrumentos
                         autóctonos como el bombo, la quena y la tarola.
                    </p>
                </div>
                <div class="col-md-4 col-sm-6 mb-4 text-center servicio-item">
                    <div class="icono"><i class="fas fa-mask"></i></div>
                    <h4>Alquiler de disfraces</h4>
                    <p>lquiler de trajes típicos y disfraces tradicionales para eventos culturales y celebraciones folclóricas.</p>
                </div>
                <div class="col-md-4 col-sm-6 mb-4 text-center servicio-item">
                    <div class="icono"><i class="fas fa-graduation-cap"></i></div>
                    <h4>Formación certificable</h4>
                    <p>Programas educativos en danza, música y cultura andina, con certificación oficial al finalizar.</p>
                </div>
                <div class="col-md-4 col-sm-6 mb-4 text-center servicio-item">
                    <div class="icono"><i class="fas fa-globe-americas"></i></div>
                    <h4>Difusión cultural</h4>
                    <p> preservación de la cultura andina a través de festivales y eventos culturales.</p>
                </div>
            </div>
        </div>
    </section>

















    <section id="fotos" class="fotos">
        <div class="contenido-seccion">
            <h2>RESULTADOS</h2>
            <div class="galeria">
                <div class="proyecto">
                    <img src="img/tinajani.png" alt="">
                    <div class="overlay">
                        <h3>TINAJANI 2023</h3>
                        <p>Qanchi de Mamuera</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="img/tintiri.png" alt="">
                    <div class="overlay">
                        <h3>TINTIRI 2023</h3>
                        <p>Qanchi de Mamuera</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="img/ollaytantambo.png" alt="">
                    <div class="overlay">
                        <h3>OLLANTAYTAMBO 2023</h3>
                        <p>Qanchi de Mamuera</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="img/mages.png" alt="">
                    <div class="overlay">
                        <h3>MAGES 2023</h3>
                        <p>Qanchi de Mamuera</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="img/hunter.png" alt="">
                    <div class="overlay">
                        <h3>HUNTER 2023</h3>
                        <p>Qanchi de Mamuera</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="img/chom.png" alt="">
                    <div class="overlay">
                        <h3>CHOMBIVILCAS 2023</h3>
                        <p>Qanchi de Mamuera</p>
                    </div>
                </div>
            </div>
        </div>
    </section>























 <footer id="footer"  class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="contact-form">
                <H1>INSCRIPCIONES</H1>
                <form action="insert_solicitud.php" method="post">
                    <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu Nombre" required>
                    <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu Apellido" required>
                    <input type="tel" id="telefono" name="telefono" placeholder="Ingresa tu Teléfono" required>
                    <input type="text" id="dni" name="dni" placeholder="Ingresa tu DNI" required>
                    <button type="submit" class="btn btn-submit"><i class="fas fa-paper-plane"></i> Enviar</button>
                </form>                
            </div>
            <div class="footer-info">
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                    <a href="#"><i class="fab fa-x"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
                <p>&copy; 2024 Desarrollado por jhon sanca</p>
            </div>
        </div>
    </div>
</footer>




















    <script src="js/script.js"></script>
</body>
</html>
