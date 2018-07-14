s = 'I like cats   '

# Upper case string
print(s.upper())

# Lower case string
print(s.lower())

# Capitalize string
print(s.capitalize())

# Strips whitespace and uppercase
print(s.strip().upper())

# Find sub string starting at position 9
print(s.find('t', 5))

# Finds the length of the string
print(len(s))

# Return the sub string starting at pos 5 and ending at pos 16
print(s[7:10])

# Replace string 'cats' with 'dogs'
print(s.replace('cats', 'dogs'))

print(s)
