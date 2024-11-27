@extends('employer.employer')

@section('content')
        <div class="container mt-5">
                <div class="row bg-light align-items-center text-center py-3 shadow-sm mb-4">
                        <h1 class="fw-bold text-center" style="color: #d7a343; font-family: Poppins;">Create your Joblist</h1>
                </div>
        
                <div class="d-flex justify-content-between mb-3">
                        <select class="form-select" id="sortedbyrelevance" name="sortedbyrelevance" aria-label="Sorted By Relevance" style="width:190px;">
                            <option value="" selected disabled>Sorted by relevance</option>
                            <option value="Relevance">Relevance</option>
                            <option value="Date">Date</option>
                        </select>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddJobs"><i class="bi bi-file-earmark-plus me-2"></i>Add new jobs</button>
                </div>

                <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                                <tr>
                                <th width="10%">Time</th>
                                <th>Job Title</th>
                                <th width="20%">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                <td>1 min ago</td>
                                <td>Professional Resume</td>
                                <td>

                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                                <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete
                                </button>
                                
                                <button class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i> View
                                </button>
                                </td>
                                </tr>
                        </tbody>
                </table> 
        </div>


        <!-- Modal add Jobs -->
        <div class="modal fade" id="modalAddJobs" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                                <div class="modal-header text-dark" style="background-color: #d7a343;">
                                <h5 class="modal-title">Create a Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                        <div class="modal-body">
                        <div class="container-fluid">
                                <form action="">
                                
                                </form>
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-dark">Create</button>
                        </div>
                </div>
                </div>
        </div>

@endsection