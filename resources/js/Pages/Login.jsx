import React from 'react';
import { useState } from 'react';
import { router } from '@inertiajs/react';

export default function Login() {

    const [loginValues, setLoginValues] = useState({
        email: '',
        password: '',
    });
  
    const handleLogin = (event) => {
        event.preventDefault();
        router.post('/login', loginValues);
    };

    const handleChange = (event) => {
        const key = event.target.id;
        const value = event.target.value;

        setLoginValues(loginValues => ({
            ...loginValues,
            [key]: value,
        }));
    };
  
    return (
        <div>
            <h1>Login here</h1>
            <form onSubmit={handleLogin}>
                <div>
                    <label htmlFor='email'>Email:</label>
                    <input  
                        id='email' 
                        className='border-2' 
                        type='email'
                        value={loginValues.email} 
                        required
                        onChange={handleChange} 
                    />
                </div>
                <div>
                    <label htmlFor='password'>Password:</label>
                    <input 
                        id='password' 
                        className='border-2' 
                        type='password' 
                        value={loginValues.password}
                        required
                        onChange={handleChange}
                    />
                </div>
                <button type='submit'>
                    login
                </button>
            </form>
        </div>
  )
}
