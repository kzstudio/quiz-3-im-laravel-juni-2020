


<form action="{{url('/artikel/'.(isset($items)?$items->artikel_id:null))}}" method="POST" id="form-artikel">
    @csrf
    <?php if (isset($items)){ ?>
        @method('PUT')
    <?php } ?>
    <div class="form-group">
        <input value="{{(isset($items)?$items->judul:null)}}" type="text" name='judul' class="form-control form-control-user required"   placeholder="Judul Artikel" required>
    </div>

    <div class="form-group">
        <textarea name='isi' class="form-control form-control-user required" placeholder="Isi Artikel">
            {{(isset($items)?$items->isi:null)}}
        </textarea>
    </div>

    <div class="form-group">
        <input value="{{(isset($items)?$items->tag:null)}}" type="text" name="tag" value="" data-role="tagsinput" class="tag" placeholder="Tag....." required>
    </div>

    <button type="button" class="btn btn-info btn-icon-split" onclick="submit_data();">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Simpan</span>
    </button>

    <a href="{{url('/artikel')}}" class="btn btn-danger btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-circle-left"></i>
    </span>
    <span class="text">Kembali</span>
    </a>



@push('scripts')

<link rel="stylesheet" href="{{asset('/sbadmin2/css/bootstrap-tagsinput.css')}}">

<script src="{{asset('/sbadmin2/js/bootstrap-tagsinput.js')}}"></script>

<script>
function submit_data(){
    var cek = 0; 
    $("#form-artikel").find('input.required, textarea.required').each(function(){
        $(this).parents('.form-group').removeAttr('style');
        if ($(this).val() == ''){
            cek++;
            $(this).parents('.form-group').attr('style','border:red 1px solid;');
        }
    });
   
    if (cek > 0){
        Swal.fire({
            title: 'Perhatian!',
            text: 'Ada Inputann yang belum diisi',
            icon: 'error',
            confirmButtonText: 'Cool'
        });
        return false;
    }else{
        $("#form-artikel").submit();
    }

    
}

$(document).ready(function(){
    setTimeout(() => {
        $("#tag").tagsinput();
    }, 200);
   
});
</script>
@endpush
