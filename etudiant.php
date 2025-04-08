<?php
class etudiant {
    private string $nom;
    private array $notes;

    public function __construct($nom, $notes) {
        $this->nom = $nom;
        $this->notes = $notes;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }

    public function print_all($etudiants) {
        echo '<div class="container text-center mt-5">';
        echo '<div class="row">';
        foreach ($etudiants as $et) {
            echo '<div class="col">';
            echo '<table class="table">';
            echo '<thead>';
            echo '<th>' . $et->getNom() . '</th>';
            echo "</thead>";
            echo '<tbody>';
            foreach ($et->getNotes() as $note) {
                $color="";
                if ($note < 10) {
                    $color = "table-danger";
                } elseif ($note == 10) {
                    $color = "table-warning";
                } elseif ($note > 10) {
                    $color = "table-success";
                }
                
                echo '<tr>';
                echo '<td class="'. $color.'"> ' . $note . ' </td> ';
                echo '</tr>';
            }
            echo '<tr>';
            echo '<td class="table-primary ">Votre moyenne est: ' .sprintf('%.2f',$et->getMoyenne())  . '</td>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>'; 
        }
        echo '</div>';
        echo '</div>';
    }

    public function getMoyenne() {
        $somme = 0;
        foreach ($this->notes as $note) {
            $somme += $note;
        }
        return $somme / count($this->notes);
    }

    public function admis() {
        return $this->getMoyenne() >= 10;
    }
}