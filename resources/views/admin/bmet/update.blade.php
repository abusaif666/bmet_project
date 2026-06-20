@extends('admin.layouts.admin')

@section('title', 'Edit BMET Data')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Edit BMET Data
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
                    Edit BMET Data
                </span>

            </div>

        </div>

        <div>
            <a href="{{ route('bmet.index') }}" class="btn-list">
                <i class="fa-solid fa-list"></i>
                BMET List
            </a>
        </div>

    </div>

    <div class="form-body">

        <form
            action="{{ route('bmet.update', $bmet->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- Name --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $bmet->name) }}" placeholder="Enter Name">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Passport No --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Passport No <span class="text-danger">*</span></label>
                            <input type="text" name="passport_no" class="form-control @error('passport_no') is-invalid @enderror"
                                value="{{ old('passport_no', $bmet->passport_no) }}" placeholder="Enter Passport No">
                            @error('passport_no')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                {{-- Phone --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $bmet->phone) }}" placeholder="Enter Phone Number">
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Gender --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender', $bmet->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $bmet->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender', $bmet->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Father's Name --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Father's Name</label>
                        <input type="text" name="father_name" class="form-control" value="{{ old('father_name', $bmet->father_name) }}" placeholder="Enter Father's Name">
                    </div>
                </div>

                {{-- Mother's Name --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mother's Name</label>
                        <input type="text" name="mother_name" class="form-control" value="{{ old('mother_name', $bmet->mother_name) }}" placeholder="Enter Mother's Name">
                    </div>
                </div>

                {{-- Blood Group --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Blood Group</label>
                        <input type="text" name="blood_group" class="form-control" value="{{ old('blood_group', $bmet->blood_group) }}" placeholder="e.g. O+, A+">
                    </div>
                </div>

                {{-- Date of Birth --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $bmet->date_of_birth) }}">
                    </div>
                </div>

                {{-- NID --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>NID Number</label>
                        <input type="text" name="nid" class="form-control" value="{{ old('nid', $bmet->nid) }}" placeholder="Enter NID">
                    </div>
                </div>

                {{-- BMET No --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>BMET No</label>
                        <input type="text" name="bmet_no" class="form-control" value="{{ old('bmet_no', $bmet->bmet_no) }}" placeholder="Enter BMET No">
                    </div>
                </div>

                <hr class="my-3">

                {{-- EC No --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>EC No</label>
                        <input type="text" name="ec_no" class="form-control" value="{{ old('ec_no', $bmet->ec_no) }}" placeholder="Enter EC No">
                    </div>
                </div>

                {{-- Clearance ID --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Clearance ID</label>
                        <input type="text" name="clearance_id" class="form-control" value="{{ old('clearance_id', $bmet->clearance_id) }}" placeholder="Enter Clearance ID">
                    </div>
                </div>

                {{-- EC Date --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>EC Date</label>
                        <input type="date" name="ec_date" class="form-control" value="{{ old('ec_date', $bmet->ec_date) }}">
                    </div>
                </div>

                {{-- Passport Issue Date --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Passport Issue Date</label>
                        <input type="date" name="passport_issue_date" class="form-control" value="{{ old('passport_issue_date', $bmet->passport_issue_date) }}">
                    </div>
                </div>

                {{-- Passport Expiry Date --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Passport Expiry Date</label>
                        <input type="date" name="passport_expiry_date" class="form-control" value="{{ old('passport_expiry_date', $bmet->passport_expiry_date) }}">
                    </div>
                </div>

                {{-- Visa No --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Visa No</label>
                        <input type="text" name="visa_no" class="form-control" value="{{ old('visa_no', $bmet->visa_no) }}" placeholder="Enter Visa No">
                    </div>
                </div>

                {{-- Visa Issue Date --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Visa Issue Date</label>
                        <input type="date" name="visa_issue_date" class="form-control" value="{{ old('visa_issue_date', $bmet->visa_issue_date) }}">
                    </div>
                </div>

                {{-- Visa Expiry Date --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Visa Expiry Date</label>
                        <input type="date" name="visa_expiry_date" class="form-control" value="{{ old('visa_expiry_date', $bmet->visa_expiry_date) }}">
                    </div>
                </div>

                {{-- Country --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country', $bmet->country) }}" placeholder="Enter Country">
                    </div>
                </div>

                {{-- Referral Name --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Referral Name</label>
                        <input type="text" name="referral_name" class="form-control" value="{{ old('referral_name', $bmet->referral_name) }}" placeholder="Enter Referral Name">
                    </div>
                </div>

                {{-- Employer --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Employer</label>
                        <input type="text" name="employer" class="form-control" value="{{ old('employer', $bmet->employer) }}" placeholder="Enter Employer">
                    </div>
                </div>

                {{-- Office Name --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Office Name</label>
                        <input type="text" name="office_name" class="form-control" value="{{ old('office_name', $bmet->office_name) }}" placeholder="Enter Office Name">
                    </div>
                </div>

                {{-- RL No --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>RL No</label>
                        <input type="text" name="rl_no" class="form-control" value="{{ old('rl_no', $bmet->rl_no) }}" placeholder="Enter RL No">
                    </div>
                </div>

                <hr class="my-3">

                {{-- Address Fields --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Village</label>
                        <input type="text" name="village" class="form-control" value="{{ old('village', $bmet->village) }}" placeholder="Village">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Post Office</label>
                        <input type="text" name="post_office" class="form-control" value="{{ old('post_office', $bmet->post_office) }}" placeholder="Post Office">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Police Station</label>
                        <input type="text" name="police_station" class="form-control" value="{{ old('police_station', $bmet->police_station) }}" placeholder="Police Station">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Upazila</label>
                        <input type="text" name="upazila" class="form-control" value="{{ old('upazila', $bmet->upazila) }}" placeholder="Upazila">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>District</label>
                        <input type="text" name="district" class="form-control" value="{{ old('district', $bmet->district) }}" placeholder="District">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Division</label>
                        <input type="text" name="division" class="form-control" value="{{ old('division', $bmet->division) }}" placeholder="Division">
                    </div>
                </div>

                <hr class="my-3">

                {{-- Photo Upload --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Applicant Photo</label>
                        <input
                            type="file"
                            name="photo"
                            class="dropify @error('photo') is-invalid @enderror"
                            data-height="180"
                            data-allowed-file-extensions="jpg jpeg png webp"
                            data-default-file="{{ $bmet->photo ? asset('storage/bmet/' . $bmet->photo) : '' }}"
                        />
                        @error('photo') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- QR Code Upload --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>QR Code</label>
                        <input
                            type="file"
                            name="qr_code"
                            class="dropify @error('qr_code') is-invalid @enderror"
                            data-height="180"
                            data-allowed-file-extensions="jpg jpeg png webp"
                            data-default-file="{{ $bmet->qr_code ? asset('storage/bmet/' . $bmet->qr_code) : '' }}"
                        />
                        @error('qr_code') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="col-md-12 mt-4">
                    <button type="submit" class="btn-submit">
                        Update BMET Data
                    </button>
                </div>

            </div>

        </form>

    </div>

</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
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