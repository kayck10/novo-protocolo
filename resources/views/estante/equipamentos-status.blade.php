@foreach ($equipamentos as $equipamento)
    <div class="col-md-3 text-center">
        <div><img src="http://tiprotocolo.maracanau.ce.gov.br/imagens/estante/1.png"
                width="100" height="100" alt="Figura nao encontrada" margin="20 20 20 20"></div>
        <div class="row">
            <div class="text text-center" style="margin: 2 2 2 2 !important;">
                <h4><span class="text-red">
                        <b>{{ $equipamento->tombamento }}</b>
                    </span>
                </h4>
                <span class="text-red">
                    <b>{{ $equipamento->created_at }}</b>
                </span>
            </div>
        </div>
    </div>
@endforeach
