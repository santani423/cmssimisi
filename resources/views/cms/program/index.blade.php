@extends('cms.layout.index')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card planned_task p-4">
            <div class="header d-flex justify-content-between align-items-center">
                <h2>Program</h2>
                <a href="{{ route('cms.program.create') }}" class="btn btn-primary">Add Program</a>
            </div>
            <div class="body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th>Deskripsi</th>
                            <th>PDF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableProgram">
                        <!-- Data will be dynamically loaded here -->
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination justify-content-center">
                        <!-- Pagination links will be dynamically loaded here -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus program ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Hapus</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        let selectedId = null;

        function show(page = 1) {
            $.ajax({
                url: `/api/program?page=${page}`,
                method: 'GET',
            }).done(function(response) {
                const data = response || [];
                const currentPage = response?.data?.current_page || 1;
                const lastPage = response?.data?.last_page || 1;
                const container = $('#tableProgram');
                container.empty();

                if (data.length === 0) {
                    container.append('<tr><td colspan="5" class="text-center">No data available</td></tr>');
                } else {
                    data.forEach(function(item, index) {
                        const deskripsiText = item.deskripsi
                            ? item.deskripsi.replace(/(<([^>]+)>)/gi, "").substring(0, 80) + '...'
                            : '-';
                        const pdfLink = item.pdf_path 
                            ? `<a href="/storage/${item.pdf_path}" target="_blank" class="text-primary">Lihat PDF</a>`
                            : '-';

                        const html = `
                            <tr>
                                <td>${(currentPage - 1) * data.length + index + 1}</td>
                                <td>${item.nama_program || '-'}</td>
                                <td>${deskripsiText}</td>
                                <td>${pdfLink}</td>
                                <td>
                                    <a href="/cms/program/edit/${item.id}" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger btn-delete" data-id="${item.id}">Hapus</button>
                                </td>
                            </tr>`;
                        container.append(html);
                    });
                }

                // Pagination
                const paginationContainer = $('.pagination');
                paginationContainer.empty();
                let startPage = Math.max(currentPage - 2, 1);
                let endPage = Math.min(currentPage + 2, lastPage);

                if (currentPage > 1) {
                    paginationContainer.append(`<li class="page-item"><a class="page-link" href="#" data-page="${currentPage - 1}">«</a></li>`);
                }

                for (let i = startPage; i <= endPage; i++) {
                    paginationContainer.append(`<li class="page-item ${i === currentPage ? 'active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`);
                }

                if (currentPage < lastPage) {
                    paginationContainer.append(`<li class="page-item"><a class="page-link" href="#" data-page="${currentPage + 1}">»</a></li>`);
                }
            }).fail(function(xhr, status, error) {
                console.error('Error:', error);
            });
        }

        // Pagination Click
        $(document).on('click', '.pagination .page-link', function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            if (page) {
                show(page);
                $('html, body').animate({ scrollTop: $('#tableProgram').offset().top - 100 }, 500);
            }
        });

        // Delete Button Click
        $(document).on('click', '.btn-delete', function() {
            selectedId = $(this).data('id');
            $('#confirmDeleteModal').modal('show');
        });

        // Confirm Delete
        $('#deleteConfirmBtn').on('click', function() {
            if (selectedId) {
                $.ajax({
                    url: `/api/program/${selectedId}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#confirmDeleteModal').modal('hide');
                        show();
                        selectedId = null;
                    },
                    error: function(err) {
                        console.error('Delete failed:', err);
                        alert('Gagal menghapus data.');
                    }
                });
            }
        });

        show(); // initial load
    });
</script>
@endsection
