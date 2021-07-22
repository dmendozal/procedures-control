@extends('layouts.app')
@section('content')
<div class="col-lg-12 col-12 mb-20">
    @if ($errors->any())
    <div class="alert alert-danger">
        <h6>Por favor corrige los errores debajo:</h6>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h6 class="mb-15">Formulario de Registro</h6>
    <form action="{{ route('sale.store')}}" onsubmit="return validateSubmit()" method="POST">
        @csrf
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label>Cantidad</label>
                <input type="number" class="form-control" name="amount" id="idamount" />
            </div>
            <div class="col-6 mb-15">
                <label for="fkidproduct">Producto </label>
                <select name="fkidproduct" onchange="getValue()" id="fkidproduct" class="form-control select2">
                    <option value="0" >
                        --SELECCIONAR--
                    </option>
                    @foreach($products as $product)
                    <option value="{{$product->idproduct}}_{{$product->stock}}_{{$product->sell_price}}">
                        {{ $product->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 mb-15" id="divPerson">
                <label for="fkidperson"> Persona </label>
                <select name="fkidperson" id="fkidperson" class="form-control select2">
                    <option value="0">
                        --SELECCIONAR--
                    </option>
                    @foreach($persons as $person)
                    <option value="{{$person->idperson}}">
                        {{ 'Nombre: '.$person->fullname.'; CI: '.$person->ci.'; Numero de Telefono: '.$person->number }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <div class="col-md-2">
                <label class="form-control-label" for="stock">Stock</label>

                <input type="number" disabled id="stock" name="stock" class="form-control"
                    placeholder="Ingrese el stock" pattern="[0-9]{0,15}">
            </div>
            <div class="col-md-2">
                <label class="form-control-label" for="sell_price">Precio Venta (Bs.)</label>

                <input type="number" disabled id="sell_price" name="sell_price" class="form-control"
                    placeholder="Ingrese precio de venta">
            </div>
        </div>
        <br />
        <div class="row mbn-15">
            <div class="col-md-2">
                <button type="button" id="id_add" onclick="addProduct()" class="btn btn-primary">
                    Agregar a la venta
                </button>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Crear Persona
                </button>
            </div>

        </div>
        <br />

        <div class="form-group row border">

            <h3>Nota de Venta</h3>

            <div class="table-responsive col-md-12">
                <table id="details" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-secondary ">
                            <th>Eliminar</th>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Precio Venta(Bs.)</th>
                            <th>Cantidad</th>
                            <th>SubTotal (Bs.) </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="5">
                                <p align="right">TOTAL:</p>
                            </th>
                            <th>
                                <p align="right"><span id="total">Bs. 0.00</span><input type="hidden"
                                        name="total_to_pay" id="total_to_pay"> </p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5">
                                <p align="right">TOTAL PAGADO:</p>
                            </th>
                            <th>
                                <p align="right"><span>Bs. </span><input type="text" oninput="checkPaidOutWithToPay()"
                                        name="total_paid_out" id="total_paid_out"> </p>
                            </th>
                        </tr>
                    </tfoot>

                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="modal-footer form-group row" id="id_save_sell">
            <div class="col-md">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <button type="submit" class="btn btn-success"> Registrar venta</button>
            </div>
        </div>
        <br>
        <div style="text-align: center">
            <a class="button button-danger" href="{{ route('sale.index') }}">Volver</a>
        </div>
    </form>
    <div class="modal modal fade modal-custom" id="myModal" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">
                <form action="{{ route("debtor.store") }}" method="POST" enctype="multipart/form-data">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Persona
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        @csrf
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}"
                                style="margin-bottom:20px;">
                                <span class="fa fa-user"> Nombre completo </span>
                                <input type='text' id="fullname" name="fullname" class="form-control" required />
                            </div>
                            <div class="form-group {{ $errors->has('ci') ? 'has-error' : '' }}"
                                style="margin-bottom:20px;">
                                <span class="fa fa-cab"> Carnet de Identidad </span>
                                <input type='text' id="ci" name="ci" class="form-control" required />
                            </div>
                            <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}"
                                style="margin-bottom:20px;">
                                <span class="fa fa-phone"> Numero de Telefono</span>
                                <input type='number' id="number" name="number" class="form-control" required />
                            </div>
                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                <span class="fa fa-genderless"> Genero </span>
                                <select name="gender" id="gender" class="form-control js-select2" required
                                    style="align-items: flex-start">
                                    <option value=""> --SELECCIONAR-- </option>
                                    <option value="0" >MASCULINO</option>
                                    <option value="1">FEMENINO</option>
                                </select>
                                @if($errors->has('gender'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input class="btn btn-danger" type="submit" value="Guardar">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" >
    $(document).ready(function(){



    });

    function validateSubmit() {
        //checkStock();
        var totalToPay = $("#total_to_pay").val();
        var totalPaidOut = $("#total_paid_out").val();
        var debtor = $("#fkidperson").val();
        if (totalPaidOut == totalToPay){
            return confirm(
                "La venta se efectuará correctamente con los siguientes datos: \nTOTAL PAGADO: "+totalPaidOut + "\nTOTAL A PAGAR: "+totalToPay +" \nDEUDA: "+ (totalToPay - totalPaidOut) +" \n¿DESEA CONTINUAR?");
        }else{
            if(debtor == 0){
                alert("El total pagado no es igual al total por pagar. Por favor, Registrar un deudor")
                return false;
            }
            return confirm(
                "La venta se efectuará correctamente con los siguientes datos: \nTOTAL PAGADO: "+totalPaidOut + "\nTOTAL A PAGAR: "+totalToPay +" \nDEUDA: "+ parseFloat((totalToPay - totalPaidOut)).toFixed(2) +" \n¿DESEA CONTINUAR?");
        }
    }
    var dropdowninitial = document.getElementById('fkidproduct').value;
    var deudor = false;
    var cont=0;
    total=0;
    subtotal=[];
    $('#id_save_sell').hide();
    function getValue(){
        var dataProduct = document.getElementById("fkidproduct").value.split('_');
        $("#sell_price").val(parseFloat(dataProduct[2]).toFixed(2));
        $("#stock").val(dataProduct[1]);
    }

    function checkPaidOutWithToPay() {
        var totalToPay = $("#total_to_pay").val();
        var totalPaidOut = $("#total_paid_out").val();
        var divPerson = $('#divPerson');
        if (totalToPay == totalPaidOut) {
            $("fkidperson").attr("required", false);
            divPerson.hide();
        }else{
            divPerson.show();
            $('#fkidperson').attr("required",true);

        }
    }

    function addProduct() {
        var dataProduct = document.getElementById('fkidproduct').value.split('_');
        var idProduct = dataProduct[0];
        var productName = $("#fkidproduct option:selected").text();

        var amount = $("#idamount").val();
        var sellPrice= $("#sell_price").val();
        var stock = $("#stock").val();
        console.log(dataProduct, idProduct, amount, sellPrice, stock);
        if(idProduct != "" && amount != "" && amount > 0  && sellPrice != ""){
            if(parseInt(stock) >= parseInt(amount)){
                subtotal[cont] = amount * sellPrice;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times fa-2x"></i></button></td> <td>'+parseInt(idProduct)+' </td>  <td><input type="hidden" name="id_producto[]" value="'+idProduct+'">'+productName+'</td> <td><input type="number" name="sell_price[]" value="'+parseFloat(sellPrice).toFixed(2)+'"> </td> <td><input type="number" name="amount[]" id="id_amount'+cont+'" value="'+amount+'"> </td> <td><input type="number" name="subtotal[]" value="'+parseFloat(subtotal[cont]).toFixed(2)+'"></td></tr>';
                cont++;
                console.log(total);
                cleanFields();
                setTotal();
                checkSaveButton();

                $('#details').append(fila);
                $('#total_paid_out').val(0);
                $('#fkidperson').attr("required",true);

            }else{
                alert("La cantidad a vender supera el stock");
            }
        }else{
            alert("Rellene todos los campos del detalle de la venta");
        }

    }

    function checkStock(amount){
        var stock = $("#stock").val();
        $("#stock").val(stock-amount);
    }

    function setTotal(){
        $("#total").html("Bs. " + total.toFixed(2));
        $("#total_to_pay").val(total.toFixed(2));

    }
    function cleanFields() {
        $("#idamount").val(0);
        $("#fkidproduct").val(dropdowninitial);
    }

    function checkSaveButton(){

        if(total>0){

        $("#id_save_sell").show();

        } else{

        $("#id_save_sell").hide();
        }
    }

    function insertProduct(){
        var product = $('#fkidproduct').children();
        var amount = $('#idamount').text();
        console.log(product, amount);
    }

    function eliminar(index){
        // var stock = parseInt($("#stock").val());
        // var amount = parseInt($("#id_amount"+index).val());
        // console.log(stock, amount);
        // var result = stock+amount;
        // $("#stock").val(result);

        total=total-subtotal[index];

        $("#total").html("Bs. " + total.toFixed(2));
        $("#total_to_pay").val(total.toFixed(2));

        $("#fila" + index).remove();
        checkSaveButton();
    }
</script>
@endsection
