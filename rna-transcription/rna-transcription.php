<?php

function toRna($dna)
{
    $rna = preg_replace('/[A]/', 'U', $dna);
    $rna = preg_replace('/[T]/', 'A', $rna);
    $rna = preg_replace('/[G]/', 'X', $rna);
    $rna = preg_replace('/[C]/', 'G', $rna);
    $rna = preg_replace('/[X]/', 'C', $rna);

    return $rna;
}

