<section style="min-height: calc(100vh - 83px)" class="light-bg">
  
  <div class="container">
    <div class="row">
      <div class="col-lg-offset-3 col-lg-6 text-center">
        <div class="section-title">
          <h2>Área do cliente</h2>
        </div>
      </div>
    </div>

    

  <div class="container">
  
 
    

    <div class="tab-content">
      <div id="tab_cliente" class="tab-pane active">
         <div class="container-fluid">
          <h2 class="text-center">Entre em contato conosco</h2>
          <p class="text-center">Envie sua mensagem que logo entraremos em contato!</p>
          <a id="btn_add_cliente" class="btn btn-primary"><i class="fa fa-plus">&nbsp;&nbsp;Adicionar Mensagem</i></a>
          <table id="dt_cliente" class="table table-striped table-bordered">
            <thead>
              <tr class="tableheader">
                <th class="dt-center">Nome</th>
                <th class="dt-center no-sort">email</th>
                <th class="no-sort">Mensagem</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
         </div>
      </div>
     
      
    

    </div>
  </div>
</section>

<div id="modal_cliente" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h4 class="modal-title">Mensagens</h4>
      </div>

      <div class="modal-body">
        <form id="form_cliente">

          <input id="cliente_id"  name="cliente_id"  hidden>

          <div class="form-group">
            <label class="col-lg-2 control-label">Nome</label>
            <div class="col-lg-10">
              <input id="cliente_nome" name="cliente_nome" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

           <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <input id="cliente_email" name="cliente_email" class="form-control" maxlength="100">
              <span class="help-block"></span>
            </div>
          </div>

          

          <div class="form-group">
            <label class="col-lg-2 control-label">Deixe sua mensagem</label>
            <div class="col-lg-10">
              <textarea id="cliente_mensagem" name="cliente_mensagem" class="form-control"></textarea>
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group text-center">
            <button type="submit" id="btn_save_cliente" class="btn btn-primary">
              <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
            </button>
            <span class="help-block"></span>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

