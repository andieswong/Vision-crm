@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top: 30px;padding-bottom: 30px">
        <div class="row">
            <div class="col-12">

                <div class="card-header" >
                    Llamar
                    @if(session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                </div>
                <div class="card-body">
                    <form id="contactForm" role="form">
                        <div class="form-group">
                            <h3>Call Sales</h3>
                            <p class="help-block">
                                Are you interested in impressing your friends and
                                confounding your enemies? Enter your phone number
                                below, and our team will contact you right away.
                            </p>
                        </div>
                        <label>Your number</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="userPhone" id="userPhone"
                                   placeholder="(651) 555-7889">
                        </div>
                        <label>Sales team number</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="salesPhone" id="salesPhone"
                                   placeholder="(651) 555-7889">
                        </div>
                        <button type="submit" class="btn btn-default">
                            Contact Sales
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
