<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="container">

      <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">

          <br><br>
          
        </div>
        
      </div>

      <div class="row">

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">

          <h2>Crie Seu Cadastro</h2>
          <br>
          
          <form method="POST" action="/createAccount">

            <div class="form-group">

              <label for="name">Nome Completo: </label>
              <input class="form-control" type="text" name="name">
            
            </div>

            <div class="form-group">

              <label for="age">Idade: </label>
              <input class="form-control" type="number" name="age">
            
            </div>
          
            <div class="form-group">

              <label for="email">Email: </label>
              <input class="form-control" type="email" name="email">
            
            </div>

            <div class="form-group">

              <label for="password">Senha: </label>
              <input class="form-control" type="password" name="password">
            
            </div>

            <input type="submit" name="submit" class="btn btn-success" value="Cadastrar">

          </form>

        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">

          <h2>Faça Login</h2>
          <br>
          
          <form method="POST" action="/login">
          
            <div class="form-group">

              <label for="emailLogin">Email: </label>
              <input class="form-control" type="email" name="emailLogin">
            
            </div>

            <div class="form-group">

              <label for="passwordLogin">Senha: </label>
              <input class="form-control" type="password" name="passwordLogin">
            
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Logar">

          </form>

        </div>
        
      </div>
      
    </div>