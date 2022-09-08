<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="ml-2 mr-2">
@php
    // name of the field of company name
    $companyName = 'Company Name'
@endphp
<h1>Fill in the form, please</h1>
<form id="formData" onsubmit="return validateForm()" method="get" action="/historicalData">
    <input type="text" id="companyName" hidden name="companyName" value="{{ old('companyName') }}">
    <div class="row form-group mb-3">
        <label for="date" class="col-sm-2 col-form-label">Company symbol </label>
        <div class="col-sm-4">

            <select class="form-control" id="companySymbol" name="companySymbol"
                    onchange="return setCompanyNameAndSymbol()">
                <option selected disabled value="">Choose Company...</option>
                @foreach($companies as $company)

                    <option value="{{$company->$companyName}}">{{$company->Symbol}}</option>

                @endforeach
            </select>

        </div>
    </div>

    <div class="row form-group mb-3">
        <label for="startDate" class="col-sm-2 col-form-label">Start Date</label>
        <div class="col-sm-4">
            <div class="input-group date" id="startDatePicker">
                <input type="text" class="form-control" id="startDate" name="startDate" value="{{ old('startDate') }}">
                <span class="input-group-append">
                        <span class="input-group-text bg-white d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
            </div>
        </div>
    </div>

    <div class="row form-group mb-3">
        <label for="endDate" class="col-sm-2 col-form-label">End Date</label>
        <div class="col-sm-4">
            <div class="input-group date" id="endDatePicker">
                <input type="text" class="form-control" id="endDate" type="date" name="endDate"
                       value="{{ old('endDate') }}">
                <span class="input-group-append">
                        <span class="input-group-text bg-white d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
            </div>
        </div>
        <div class="col-sm-5 messages"></div>
    </div>

    <div class="row form-group mb-3">
        <label class="col-sm-2 control-label" for="email">Email</label>
        <div class="col-sm-4">
            <input id="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
        </div>
        <div class="col-sm-5 messages"></div>
    </div>

    <button type="submit" class="btn btn-primary mb-3" onclick="return validateForm()">Send</button>
</form>
@if ($errors && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#startDatePicker').datepicker({autoclose: true});
        $('#endDatePicker').datepicker({autoclose: true});
    });
</script>

<script>
    function setCompanyNameAndSymbol() {
        const companyName = $('#companySymbol').val()
        const companySymbol = $("#companySymbol option:selected").text();
        $("#companySymbol option:selected").val(companySymbol);
        $('#companyName').val(companyName);
    }

    function validateForm() { }
</script>

</html>
