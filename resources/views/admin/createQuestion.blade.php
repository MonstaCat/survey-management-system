<!-- resources/views/admin/createQuestion.blade.php -->

<form action="{{ route('questions.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="question">Question</label>
    <input type="text" name="question" id="question" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="answers">Answers</label>
    <input type="text" name="answers[]" id="answers" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="nextQuestionId">Next Question ID</label>
    <input type="text" name="nextQuestionId" id="nextQuestionId" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
