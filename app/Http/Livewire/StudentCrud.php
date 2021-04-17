<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentCrud extends Component
{
  public $data, $fname, $lname, $gender, $phone, $student_id, $search;
  public $studentdata;
  public $UpdateStudent = false;

  public function render()
  {
    $this->studentdata = Student::orderBy('id', 'desc')->get();
    return view('students.student-crud');
  }

  protected $updatesQueryString = ['search'];

  public function mount()
  {
    $this->search = request()->query('search', $this->search);
  }

  // Restablecer campos
  function rest()
  {
    $this->fname  = "";
    $this->lname  = "";
    $this->phone  = "";
    $this->gender = "Seleccionar....";
  }

  protected $rules = [
    'fname'  => 'required|min:3',
    'lname'  => 'required|min:3',
    'phone'  => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    'gender' => 'required',
  ];

  public function insert()
  {
    /* $this->validate([
    'fname'  => 'required|min:3',
    'lname'  => 'required|min:3',
    'phone'  => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    'gender' => 'required',
    ]); */
    $this->validate();

    $student = Student::create([
      'firstname' => $this->fname,
      'lastname'  => $this->lname,
      'phone'     => $this->phone,
      'gender'    => $this->gender,
    ]);
    
    $this->rest();
    session()->flash('message', 'Estudiante creado correctamente.');
  }

  public function edit($id)
  {
    $record = Student::findOrFail($id);

    $this->student_id = $id;
    $this->fname      = $record->firstname;
    $this->lname      = $record->lastname;
    $this->gender     = $record->gender;
    $this->phone      = $record->phone;

    $this->UpdateStudent = true;
  }

  public function update()
  {
    $this->validate([
      'fname'  => 'required|min:3',
      'lname'  => 'required|min:3',
      'phone'  => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
      'gender' => 'required',
    ]);

    if ($this->student_id)
    {
      $record = Student::find($this->student_id);
      $record->update([
        'firstname' => $this->fname,
        'lastname'  => $this->lname,
        'gender'    => $this->gender,
        'phone'     => $this->phone,
      ]);

      $this->rest();
      $this->UpdateStudent = false;
      session()->flash('message', 'Student successfully updated.');
    }

  }

  public function destroy($id)
  {
    if ($id)
    {
      $record = Student::where('id', $id);
      $record->delete();
    }
  }
}
