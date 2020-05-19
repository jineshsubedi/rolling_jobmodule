<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  
                  <td>Name</td>
                <td>Parent's Name</td>
                <td>Date of Birth</td>
                <td>Personal Email</td>
                <td>Citizenship Number</td>
                <td>Emergency Contact Number</td>
                <td>Blood Group</td>
                <td>Education Level</td>
                <td>Education Faculty</td>
                <td>Gender</td>
                <td>Marital Status</td>
                <td>Phone</td>
                <td>Local Address</td>
                <td>Permanent Address</td>
                <td>Contact Person</td>
                <td>Contact Person Number</td>
                <td>Official Email</td>
                <td>Staff Type</td>
                <td>Department</td>
                <td>Designation</td>
                <td>Sift Time</td>
                <td>Work Mode</td>
                <td>Business Department</td>
                <td>Join Date</td>
                <td>Salary</td>
                <td>Bank Name</td>
                <td>A/C Number</td>
                <td>PAN Number</td>
                <td>PF</td>
                <td>Status</td>
                <td>Photo</td>
                <td>Resume</td>
                <td>Citizenship</td>
                <td>Contract Paper</td>
                <td>Offer Letter</td>
                </tr>
                
              </thead>
              <tbody>
                <?php foreach($datas as $data): ?>
                <tr>
                  
                  <td><?php echo e($data->name); ?></td>
                <td><?php echo e($data->f_name); ?></td>
                <td><?php echo e($data->dob); ?></td>
                <td><?php echo e($data->personal_email); ?></td>
                <td><?php echo e($data->citizenship_number); ?></td>
                <td><?php echo e($data->emergency_contact_number); ?></td>
                <td><?php echo e($data->blood_group); ?></td>
                <td><?php echo e(\App\EducationLevel::getTitle($data->education_level)); ?></td>
                <td><?php echo e(\App\Faculty::getTitle($data->faculty)); ?></td>
                <td><?php echo e($data->gender); ?></td>
                <td><?php echo e($data->marital_status == 1 ? 'Married' : 'Unmarried'); ?></td>
                <td><?php echo e($data->phone); ?></td>
                <td><?php echo e($data->temporary_address); ?></td>
                <td><?php echo e($data->permanent_address); ?></td>
                <td><?php echo e($data->contact_person); ?></td>
                <td><?php echo e($data->contact_person_number); ?></td>
                <td><?php echo e($data->email); ?></td>
                <td><?php echo e(\App\Adjustment_staff::getType($data->staffType)); ?></td>
                <td><?php echo e(\App\Department::getTitle($data->department)); ?></td>
                <td><?php echo e(\App\Designation::getTitle($data->designation)); ?></td>
                <td><?php echo e(\App\Shifttime::gettitle($data->shiftTime)); ?></td>
                <td><?php echo e($data->employmentType == 1 ? 'Full Time' : 'Part Time'); ?></td>
                <td><?php echo e($data->business_department); ?></td>
                <td><?php echo e($data->joindate); ?></td>
                <td><?php echo e($data->salary); ?></td>
                <td><?php echo e($data->bank_name); ?></td>
                <td><?php echo e($data->account_number); ?></td>
                <td><?php echo e($data->pan); ?></td>
                <td><?php echo e($data->pf); ?></td>
                <td><?php echo e(\App\Adjustment_staff::getStatus($data->status)); ?></td>
                <td><?php if($data->image != ''): ?>
                  <?php echo e(asset('/image/'.$data->image)); ?>

                <?php endif; ?></td>
                <td><?php if($data->resume != ''): ?>
                  <?php echo e(asset('/image/'.$data->resume)); ?>

                  <?php endif; ?></td>
                <td><?php if($data->id_proff != ''): ?>
                  <?php echo e(asset('/image/'.$data->id_proff)); ?>

                  <?php endif; ?></td>
                <td><?php if($data->contract != ''): ?>
                  <?php echo e(asset('/image/'.$data->contract)); ?>

                  <?php endif; ?></td>
                <td><?php if($data->offer_letter != ''): ?>
                  <?php echo e(asset('/image/'.$data->offer_letter)); ?>

                  <?php endif; ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              
            </table>

          </body>
</html>
