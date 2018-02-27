<?php

/**
 * Class DNA
 */
class DNA
{
    /**
     * @var string
     */
    private $sequence;
    
    /**
     * @var int
     */
    private $pos = 0;

    /**
     * DNA constructor.
     * @param string $sequence
     */
    public function __construct(string $sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * Calculate the hamming distance
     * 
     * @param DNA $dna
     * @return int
     */
    public function hammingDistance(DNA $dna)
    {
        $this->validate($dna);

        $hamming_distance = 0;
        while (!$this->end()) {
            if ($this->getNext() != $dna->getNext()) {
                $hamming_distance++;
            }
        }

        return $hamming_distance;
    }

    /**
     * Validate sequences
     * 
     * @param DNA $dna
     */
    public function validate(DNA $dna)
    {
        if ($this->getSize() != $dna->getSize()) {
            throw new InvalidArgumentException('DNA strands must be of equal length.');
        }
    }

    /**
     * Get sequence size
     * 
     * @return int
     */
    public function getSize()
    {
        return strlen($this->sequence);
    }

    /**
     * Checks if it reaches the end of the sequence
     * 
     * @return bool
     */
    public function end()
    {
        return $this->pos == strlen($this->sequence);
    }

    /**
     * Take the next nucleotide from the sequence
     * 
     * @return string
     */
    public function getNext()
    {
        return ($this->sequence[$this->pos++]);
    }

}


function distance($sequence1, $sequence2)
{
    $dna1 = new DNA($sequence1);
    $dna2 = new DNA($sequence2);

    return $dna1->hammingDistance($dna2);
}
