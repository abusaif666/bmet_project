@extends('admin.layouts.admin')

@section('title', 'Add Bmet')

@section('content')

    <div class="form-wrapper">

        <div class="form-header">

            <div class="form-info">

                <h3 class="form-title">
                    Add Bmet
                </h3>

                <div class="breadcrumb">

                    <span>
                        <a href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </span>

                    <span>
                        <i class="fa-solid fa-caret-right"></i>
                    </span>

                    <span>
                        Add Applicant
                    </span>

                </div>

            </div>

            <div>
                <a href="{{ route('bmet.index') }}" class="btn-list">
                    <i class="fa-solid fa-list"></i>
                    Applicant List
                </a>
            </div>

        </div>

        <div class="form-body">

            <form action="{{ route('bmet.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row g-3">

                    {{-- Name --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Enter Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Passport No --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Passport No <span class="text-danger">*</span></label>
                            <input type="text" name="passport_no" class="form-control @error('passport_no') is-invalid @enderror"
                                value="{{ old('passport_no') }}" placeholder="Enter Passport No">
                            @error('passport_no')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" placeholder="Enter Phone Number">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Father's Name --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Father's Name</label>
                            <input type="text" name="father_name" class="form-control @error('father_name') is-invalid @enderror"
                                value="{{ old('father_name') }}" placeholder="Enter Father's Name">
                            @error('father_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Mother's Name --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mother's Name</label>
                            <input type="text" name="mother_name" class="form-control @error('mother_name') is-invalid @enderror"
                                value="{{ old('mother_name') }}" placeholder="Enter Mother's Name">
                            @error('mother_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Date of Birth --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror"
                                value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Gender --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Blood Group --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select name="blood_group" class="form-control @error('blood_group') is-invalid @enderror">
                                <option value="">Select Blood Group</option>
                                @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $bg)
                                    <option value="{{ $bg }}" {{ old('blood_group') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                                @endforeach
                            </select>
                            @error('blood_group')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- NID --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NID Number</label>
                            <input type="text" name="nid" class="form-control @error('nid') is-invalid @enderror"
                                value="{{ old('nid') }}" placeholder="Enter NID Number">
                            @error('nid')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- EC No --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>EC No</label>
                            <input type="text" name="ec_no" class="form-control @error('ec_no') is-invalid @enderror"
                                value="{{ old('ec_no') }}" placeholder="Enter EC Number">
                            @error('ec_no')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Clearance ID --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Clearance ID</label>
                            <input type="text" name="clearance_id" class="form-control @error('clearance_id') is-invalid @enderror"
                                value="{{ old('clearance_id') }}" placeholder="Enter Clearance ID">
                            @error('clearance_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- EC Date --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>EC Date</label>
                            <input type="date" name="ec_date" class="form-control @error('ec_date') is-invalid @enderror"
                                value="{{ old('ec_date') }}">
                            @error('ec_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Visa No --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Visa No</label>
                            <input type="text" name="visa_no" class="form-control @error('visa_no') is-invalid @enderror"
                                value="{{ old('visa_no') }}" placeholder="Enter Visa Number">
                            @error('visa_no')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Visa Issue Date --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Visa Issue Date</label>
                            <input type="date" name="visa_issue_date" class="form-control @error('visa_issue_date') is-invalid @enderror"
                                value="{{ old('visa_issue_date') }}">
                            @error('visa_issue_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Visa Expiry Date --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Visa Expiry Date</label>
                            <input type="date" name="visa_expiry_date" class="form-control @error('visa_expiry_date') is-invalid @enderror"
                                value="{{ old('visa_expiry_date') }}">
                            @error('visa_expiry_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Passport Issue Date --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Passport Issue Date</label>
                            <input type="date" name="passport_issue_date" class="form-control @error('passport_issue_date') is-invalid @enderror"
                                value="{{ old('passport_issue_date') }}">
                            @error('passport_issue_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Passport Expiry Date --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Passport Expiry Date</label>
                            <input type="date" name="passport_expiry_date" class="form-control @error('passport_expiry_date') is-invalid @enderror"
                                value="{{ old('passport_expiry_date') }}">
                            @error('passport_expiry_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- BMET No --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>BMET No</label>
                            <input type="text" name="bmet_no" class="form-control @error('bmet_no') is-invalid @enderror"
                                value="{{ old('bmet_no') }}" placeholder="Enter BMET Number">
                            @error('bmet_no')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- RL No --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>RL No</label>
                            <input type="text" name="rl_no" class="form-control @error('rl_no') is-invalid @enderror"
                                value="{{ old('rl_no') }}" placeholder="Enter RL Number">
                            @error('rl_no')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Referral Name --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Referral Name</label>
                            <input type="text" name="referral_name" class="form-control @error('referral_name') is-invalid @enderror"
                                value="{{ old('referral_name') }}" placeholder="Enter Referral Name">
                            @error('referral_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Employer --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Employer</label>
                            <input type="text" name="employer" class="form-control @error('employer') is-invalid @enderror"
                                value="{{ old('employer') }}" placeholder="Enter Employer Name">
                            @error('employer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Country --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror"
                                value="{{ old('country') }}" placeholder="Enter Country">
                            @error('country')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Office Name --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Office Name</label>
                            <input type="text" name="office_name" class="form-control @error('office_name') is-invalid @enderror"
                                value="{{ old('office_name') }}" placeholder="Enter Office Name">
                            @error('office_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-3">
                    <h5>Address Details</h5>

                    {{-- Village --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Village</label>
                            <input type="text" name="village" class="form-control @error('village') is-invalid @enderror"
                                value="{{ old('village') }}" placeholder="Enter Village">
                            @error('village')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Post Office --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Post Office</label>
                            <input type="text" name="post_office" class="form-control @error('post_office') is-invalid @enderror"
                                value="{{ old('post_office') }}" placeholder="Enter Post Office">
                            @error('post_office')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Police Station --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Police Station</label>
                            <input type="text" name="police_station" class="form-control @error('police_station') is-invalid @enderror"
                                value="{{ old('police_station') }}" placeholder="Enter Police Station">
                            @error('police_station')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Upazila --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Upazila</label>
                            <input type="text" name="upazila" class="form-control @error('upazila') is-invalid @enderror"
                                value="{{ old('upazila') }}" placeholder="Enter Upazila">
                            @error('upazila')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- District --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>District</label>
                            <input type="text" name="district" class="form-control @error('district') is-invalid @enderror"
                                value="{{ old('district') }}" placeholder="Enter District">
                            @error('district')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Division --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Division</label>
                            <input type="text" name="division" class="form-control @error('division') is-invalid @enderror"
                                value="{{ old('division') }}" placeholder="Enter Division">
                            @error('division')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-3">

                    {{-- Photo (Dropify) --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Applicant Photo</label>
                            <input type="file" name="photo" class="dropify @error('photo') is-invalid @enderror" 
                                data-height="100" data-allowed-file-extensions="jpg jpeg png webp" />
                            @error('photo')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    {{-- Submit Button --}}
                    <div class="col-md-12 text-end mt-4">
                        <button type="submit" class="btn-submit">
                            Submit
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                }
            });
        });
    </script>
@endsection