@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row bg-light align-items-center text-center py-3 shadow-sm mb-4">
    <h1 class="fw-bold text-center" style="color: #d7a343; font-family: Poppins;">CUSTOMIZE YOUR DREAM RESUME</h1>
    </div>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{route('resume')}}" class="btn btn-primary mt-3 d-block text-center">Go Back</a>

        <button class="btn mt-3 d-block text-center btn-success" data-bs-toggle="modal" data-bs-target="#uploadResumeModal" >
        <i class="bi bi-file-earmark-arrow-up-fill me-2"></i>Upload Resume Template
        </button>     

    </div>
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Template Name</th>
          <th>Template Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Professional Resume</td>
          <td><img src="assets/img/img1.jpg" alt="Template 1" class="img-fluid"></td>
          <td>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTemplateModal">
              <i class="fas fa-edit"></i> Edit
            </button>
            <button class="btn btn-danger btn-sm">
              <i class="fas fa-trash-alt"></i> Delete
            </button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Creative Resume</td>
          <td><img src="assets/img/img2.jpg" alt="Template 2" class="img-fluid"></td>
          <td>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTemplateModal">
              <i class="fas fa-edit"></i> Edit
            </button>
            <button class="btn btn-danger btn-sm">
              <i class="fas fa-trash-alt"></i> Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>

   
  </div>

  <!-- Upload Resume Modal -->
  <div class="modal fade" id="uploadResumeModal" tabindex="-1" aria-labelledby="uploadResumeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadResumeModalLabel">Upload Resume Template</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="templateName" class="form-label">Template Name</label>
              <input type="text" class="form-control" id="templateName" placeholder="Enter template name">
            </div>
            <div class="mb-3">
              <label for="templateImage" class="form-label">Upload Image</label>
              <input type="file" class="form-control" id="templateImage" accept="image/*">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Upload Template</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Resume Template Modal -->
  <div class="modal fade" id="editTemplateModal" tabindex="-1" aria-labelledby="editTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTemplateModalLabel">Edit Resume Template</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="editTemplateName" class="form-label">Template Name</label>
              <input type="text" class="form-control" id="editTemplateName" placeholder="Professional Resume">
            </div>
            <div class="mb-3">
              <label for="editTemplateImage" class="form-label">Upload New Image</label>
              <input type="file" class="form-control" id="editTemplateImage" accept="image/*">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Update Template</button>
        </div>
      </div>
    </div>
  </div>

@endsection