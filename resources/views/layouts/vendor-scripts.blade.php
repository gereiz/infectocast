<script src='{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}'></script>
<script src="{{ URL::asset('build/libs/@popperjs/core/umd/popper.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
<script src="{{ URL::asset('build/libs/lucide/umd/lucide.js') }}"></script>
<script src="{{ URL::asset('build/js/tailwick.bundle.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/ma70xsnqmpqcx2at79m58xbuwm95nikd8csom65avkvxcxbl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
      plugins: 'code table lists',
      toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
  </script>
@stack('scripts')