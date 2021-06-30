import styles from './styles.module.scss'
import csIcon from '../../assets/cs-icon.svg'
export const Login = () => {


  return(
    <main>
      <div className={styles.formContainer}>
        <form className={styles.formLogin}>
        <img src={csIcon} alt="Icone" />
          <h1>Faça o login para continuar</h1>
          <hr />
          <br />
          <label>Email:</label>
          <input type="text" />
          <label >Senha:</label>
          <input type="text" />
          <button>Entrar</button>
        </form>       
      </div>
    </main>
  )
}