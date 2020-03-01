<h3 class="page-title">All Inquiry
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- PAGE CONTENT STARTED -->
<table style="border-color: #0c0c0c; border-collapse: collapse;" border="1" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
    <thead>
    <tr>
        <th>Token</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Gender</th>
    </tr>
    </thead>
    <tbody>
    @if(count($inquiries)>0)
        @forelse($inquiries as $key=>$inquiry)
            <tr class="odd gradeX">
                <td>{{$inquiry->token}}</td>
                <td>{{$inquiry->name}}</td>
                <td class="center">{{$inquiry->email}}</td>
                <td class="center">{{$inquiry->mobile}}</td>
                <td class="center">&nbsp;{{$inquiry->temporary_address}}</td>
                <td class="center">{{$inquiry->gender}}</td>
            </tr>
        @empty
        @endforelse
    @endif
    </tbody>
</table>
<div class="input-group">

</div>
<!-- PAGE CONTENT ENDED -->