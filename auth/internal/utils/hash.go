package utils

import (
	"log"

	"golang.org/x/crypto/bcrypt"
)

/*
HashPlain hash plain string value.
*/
func HashPlain(plain []byte) string {
	hash, err := bcrypt.GenerateFromPassword(plain, bcrypt.MinCost)

	if err != nil {
		log.Println(err)
	}

	return string(hash)
}

/*
HashMatches compare hashed and plain value.
*/
func HashMatches(hashed string, plain []byte) bool {
	byteHash := []byte(hashed)
	return bcrypt.CompareHashAndPassword(byteHash, plain) == nil
}
