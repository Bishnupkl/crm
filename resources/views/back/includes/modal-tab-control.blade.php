@if($errors->has('inquiry_token') || $errors->has('user_id'))
    <script>
        $('.nav-pills a[href="#assignCounselor"]').tab('show');
    </script>
@endif
@if($errors->has('date') || $errors->has('follow_type') || $errors->has('reasons'))
    <script>
        $('.nav-pills a[href="#followUps"]').tab('show');
    </script>
@endif
@if($errors->has('date') || $errors->has('follow_type') || $errors->has('reasons'))
    <script>
        $('#reFollowupModal').modal('show');
    </script>
@endif

@if($errors->has('results'))
    <script>
        $('#resultModal').modal('show');
    </script>
@endif

{{--Partner Model--}}
@if($errors->has('name') || $errors->has('category') || $errors->has('street') || $errors->has('city') || $errors->has('state') || $errors->has('country_id') || $errors->has('phone') || $errors->has('email') || $errors->has('fax') || $errors->has('website'))
    <script>
        $('#partners').modal('show');
    </script>
@endif
{{--Partner Model--}}