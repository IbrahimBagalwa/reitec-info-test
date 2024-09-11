    <!-- ======= Contact Section ======= -->
    <style>
        a.active----- {
        border-bottom: 2px solid #577692;
        /* background-color: #577692; */
        }
    </style>
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2 data-aos="fade-up">Contact</h2>
                <p data-aos="fade-up">
                Vous pouvez nous contacter directement dans cette rubrique pour nous transmettre vos pr&eacute;occupations,
                 questions, propositions ou tout autre commentaire et vous aurez un feedback de notre part. Merci!
                </p>
            </div>

            <div class="row justify-content-center">

                <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
                    <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>Our Address</h3>
                        <p>
                            Q. les Volcans, <br>C. de Goma
                        </p>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-box">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <p>info@reitecinfo.org <br>&nbsp;</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-box">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Us</h3>
                        <p>+234 995 443 664<br>+234 975 200 116 </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-xl-9 col-lg-12 mt-4 py-3">
                    <form id="contact-form" class="shadow py-4">
                        <div class="form-row mx-3">
                            <div class="col-md-6 form-group">
                                <!-- <label for="nom"></label> -->
                                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom complet"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Votre email"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-12 form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-12 mx-3 text-center text-danger mb-2">
                                <span ouput-text='ouput'></span>
                            </div>
                            <div class="col-lg-12 form-group">
                                <button class="btn bg-prmy w-100 btn-subcontact" type="submit">
                                    <span>Envoyer le message</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            const sp = document.createElement('span');
            $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
            const _nom = function(){
                var n = false;
                if($('[name=name]').val().length > 4){
                    $('[name=name]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    n = true;
                }else{
                    n = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>Le nom ne doit pas contenir les caracteres spéciaux et doit avoir la taille d\'aumoins 2 lettres</span>')
                    $('[name=name]').addClass('border-danger');
                }
                return n;
            }
            const _message = function(){
                var n = false;
                if($('[name=message]').val() !== '' && $('[name=message]').val().length > 5){
                    $('[name=message]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    n = true;
                }else{
                    n = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>Le nom ne doit pas contenir les caracteres spéciaux et doit avoir la taille d\'aumoins 2 lettres</span>')
                    $('[name=message]').addClass('border-danger');
                }
                return n;
            }
            const _subject = function(){
                var n = false;
                if(/^[a-zA-Z]{2,18}$/.test($('[name=subject]').val())){
                    $('[name=subject]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    n = true;
                }else{
                    n = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>Le nom ne doit pas contenir les caracteres spéciaux et doit avoir la taille d\'aumoins 2 lettres</span>')
                    $('[name=subject]').addClass('border-danger');
                }
                return n;
            }
            const _email = function(){
                var em = false;
                if((/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/).test($('[name=email]').val())){
                    $('[name=email]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    em = true;
                }else{
                    em = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>L\'adresse email entrée ne semble pas correcte</span>')
                    $('[name=email]').addClass('border-danger');
                }
                return em;
            }
            $('#contact-form').on('submit', function(e){
                e.preventDefault();
                if(_nom() && _email() && _subject() && _message()){
                    $('.btn-subcontact').append(sp);
                    const xhr = new XMLHttpRequest();
                    const frm = new FormData(document.getElementById('contact-form'));
                    xhr.open('POST', 'reitec-scripts/php/_xhr.request.php', true);
                    xhr.onreadystatechange = function(){
                        if(xhr.readyState === 4 && xhr.status === 200){
                            const rs = parseInt(xhr.responseText);
                            switch (rs) {
                                case 200:
                                    $(sp).remove();
                                    $('[ouput-text=ouput]')
                                        .attr('class','text-success d-block')
                                        .html('<span class="fa fa-check mr-2"></span><span> Votre message est evoyeé avec succès !</span>');
                                    break;
                                case 403:
                                    $('.btn-create').removeAttr('disabled');
                                    $(sp).remove();
                                    $('[ouput-text=ouput]')
                                        .attr('class','text-danger d-block')
                                        .html('<span class="fa fa-warning mr-2"></span><span>Mot de pass ou nom d\'utilisateur incorrecte</span>');
                                    // $('[name=pwd_cnnx]').addClass('border-danger');
                                    break;
                                default:
                                    $('.btn-create').removeAttr('disabled');
                                    $(sp).remove();
                                    $('[ouput-text=ouput]')
                                        .attr('class','text-danger d-block')
                                        .html('<span class="fa fa-warning mr-2"></span><span>Impossible de poursuivre l\'operation</span>');
                                        console.log(xhr.responseText);
                                    break;
                            }
                        }
                    }
                    xhr.send(frm);
                }
            })
        })
    </script>
    <!-- End Contact Section -->