package utils_test

import (
	"testing"

	u "bitbucket.org/petstore/internal/utils"
	"github.com/stretchr/testify/assert"
)

func TestEncodePassword(t *testing.T) {
	password := "test12345"
	hashed := u.HashPlain([]byte(password))
	assert.NotEqual(t, password, hashed)
}

func TestPasswordMatches(t *testing.T) {
	password := []byte("test12345")
	fake := []byte("coolstuff")
	hashed := u.HashPlain(password)
	assert.True(t, u.HashMatches(hashed, password))
	assert.False(t, u.HashMatches(hashed, fake))
}
