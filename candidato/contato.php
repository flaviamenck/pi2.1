<?php require 'cabecalho.php'?>
<div class="box-formulario">        
        
        <div class="formulario">
            
            <div class="title-form alt">
              <h1>Contato
                <p class="subtitle">Preencha o formulário.</p>
              </h1>
            </div>
            <form action="#" method="post">
                                            
                <span>
                    <input class="width-slide" id="nome" type="text" placeholder="Nome" autocomplete="off" required="" />
                    <label for="nome"> <i class="icon icon-user-1"></i> </label>
                </span>
                <span>
                    <input class="width-slide" id="email" type="text" placeholder="E-mail" autocomplete="off" required="" />
                    <label for="email"> <i class="icon icon-mail-1"></i> </label>
                </span>
                <span>
                    <input class="width-slide" id="assunto" type="text" placeholder="Assunto" autocomplete="off" required="" />
                    <label for="assunto"> <i class="icon icon-info"></i> </label>
                </span>
                <span>
                    <textarea class="width-slide" id="mensagem" name="mensagem" type="text" rows="3" placeholder="Mensagem" autocomplete="off" required=""></textarea>
                    <label for="mensagem"> <i class="icon icon-comment"></i> </label>
                </span>
                
                <span>
                    <input type="submit" value="Enviar" class="btn-submit">
                </span>
            </form>
        </div>
    </div><!--Box Formulario--> 
    <?php require 'rodape.php' ?>