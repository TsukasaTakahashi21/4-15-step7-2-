<?php
$examScoreLists = [
  ["japanese" => 30, "math" => 30, "english" => 30],
  ["japanese" => 35, "math" => 41, "english" => 90],
  ["japanese" => 89, "math" => 40, "english" => 60],
  ["japanese" => 70, "math" => 70, "english" => 30]
];

$resultList = [];
$passingScores = ["japanese" => 35, "math" => 40, "english" => 31];

class ExamResultChecker {
  // 型 array を指定
  private array $examScoreLists;
  private array $passingScores;
  private array $resultList = [];

  public function __construct(array $examScoreLists, array $passingScores) {
    $this->examScoreLists = $examScoreLists;
    $this->passingScores = $passingScores;
  }

  public function checkResults() {
      foreach ($this->examScoreLists as $examineeNum => $examScoreList) {
        foreach ($examScoreList as $subject => $score) {
          if ($score < $this->passingScores[$subject]) {
            $this->resultList[] = ($examineeNum + 1)."番目の受験者は不合格";
            continue 2;
          }
        }
        $this->resultList[] = ($examineeNum + 1)."番目の受験者は合格";
      }
      echo implode ("\n", $this->resultList);
  }
}

$examChecker = new ExamResultChecker($examScoreLists, $passingScores);
$examChecker->checkResults();
?>
